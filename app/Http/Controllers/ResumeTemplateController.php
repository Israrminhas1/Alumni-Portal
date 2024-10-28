<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\ResumeTemplate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class ResumeTemplateController extends Controller
{
    public function index(Request $request)
    {
        $data = ResumeTemplate::query();

        if ($request->ajax()) {
            dd($request->all());
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.resume_templates.index');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'style' => 'required',
            'thumb' => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000',
        ]);

        if ($request->filled('is_active')) {
            $input['is_active'] = 1;
        } else {
            $input['is_active'] = 0;
        }

        // if ($path = public_path('storage/thumb_templates').'/'.$item->thumb) {
        //     deleteImageWithPath($path);
        // }

        if ($image = $request->file('thumb')) {

            $input['thumb'] = rand().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('storage/thumb_templates'), $input['thumb']);
        }

        $resumecvTemplate = ResumeTemplate::updateOrCreate(['id' => $request->id], $input);

        if (isset($request->save_and_builder)) {
            return to_route('settings.resume.template.builder', $resumecvTemplate);
        }

        return response()->json(['success' => true, 'message' => 'Resume template has been '.($resumecvTemplate->recentlyCreated ? 'created' : 'updated').' successfully.']);
    }

    public function update(Request $request, $id)
    {
        $item = ResumeTemplate::findOrFail($id);

        $image_name = $request->hidden_image;

        $image = $request->file('thumb');

        if ($image != '') {
            $request->validate(['name' => 'required', 'thumb' => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000'], ['thumb.mimes' => __('The :attribute must be an jpg,jpeg,png,svg')]);

            $path = public_path('storage/thumb_templates').'/'.$item->thumb;
            deleteImageWithPath($path);

            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/thumb_templates'), $image_name);
        } else {
            $request->validate(['name' => 'required']);
        }

        if (! $request->filled('is_active')) {
            $request
                ->request
                ->add(['is_active' => 0]);
        } else {
            $request
                ->request
                ->add(['is_active' => 1]);
        }

        $form_data = [
            'name' => $request->name,
            'content' => $request->content,
            'style' => $request->style,
            'is_active' => $request->is_active,
            'thumb' => $image_name,
        ];

        $item->update($form_data);

        if (isset($request->save_and_builder)) {
            return redirect()
                ->route('settings.resume.template.builder', $item);
        }

        return to_route('settings.resume.template.index')
            ->with('success', 'Updated successfully.');
    }

    public function destroy(ResumeTemplate $resumecvTemplate)
    {
        try {
            $path = public_path('storage/thumb_templates').'/'.$resumecvTemplate->thumb;
            deleteImageWithPath($path);
        } catch (Exception $e) {
            Log::error('Resume template delete :: '.$e->getMessage());
        }

        $resumecvTemplate->delete();

        return response()->json(['success' => true, 'message' => 'Resume template has been deleted successfully.']);
    }

    public function status($id)
    {
        $resumecvTemplate = ResumeTemplate::find($id);
        $resumecvTemplate->update(['is_active' => ! $resumecvTemplate->is_active]);

        return response()->json(['success' => true, 'message' => 'Resume template has been '.($resumecvTemplate->is_active ? 'enabled' : 'disabled').' successfully.']);
    }

    public function getAllTemplateThemes($id, Request $request)
    {
        // TODO
        $data = ResumeTemplate::latest()->paginate(10);

        $skin = config('app.SITE_LANDING');
        $currency_symbol = config('app.CURRENCY_SYMBOL');
        $currency_code = config('app.CURRENCY_CODE');
        $user = $request->user();

        return view('themes::'.$skin.'.templates', compact(
            'data', 'currency_code', 'currency_symbol', 'user'
        ));

    }

    public function getAllTemplate($id = null)
    {
        // TODO
        $data = ResumeTemplate::latest()->paginate(10);

        return view('admin.resume_templates.templates', compact('data'));
    }

    public function loadTemplate($templateid)
    {
        $item = ResumeTemplate::findOrFail($templateid);
        $item = replaceVarContentStyle($item);

        if ($item) {
            return response()->json([
                'content' => $item->content,
                'style' => $item->style,
            ]);
        }

        return response()->json(['error' => 'Template not found.']);
    }

    public function builder($id, Request $request)
    {
        $data = ResumeTemplate::findorFail($id);

        $data = replaceVarContentStyle($data);

        $all_templates = ResumeTemplate::latest()->get();

        $images_url = getAllImagesContentMedia();
        $all_icons = config('app.all_icons');
        $all_fonts = config('app.all_fonts');

        return view('admin.resume_templates.builder_template', compact('data', 'all_icons', 'all_fonts', 'images_url', 'all_templates'));

    }

    public function updateBuilder($id, Request $request)
    {
        $item = ResumeTemplate::findOrFail($id);

        $item->content = $request->input('gjs-html');
        $item->style = $request->input('gjs-css');

        if ($item->save()) {
            return response()->json(['success' => 'Updated successfully.']);
        }

        return response()->json(['error' => 'Updated failed.']);
    }

    public function loadBuilder($id)
    {
        $item = ResumeTemplate::findOrFail($id);

        $item = replaceVarContentStyle($item);

        if ($item) {
            return response()->json([
                'gjs-html' => $item->content,
                'gjs-css' => $item->style,
            ]);
        }

        return response()->json(['error' => __('Not Found template')]);
    }

    public function clone($id)
    {
        $template = ResumeTemplate::findorFail($id);
        $item = $template->replicate();
        $item->name = 'Copy '.$template->name;
        $item->is_active = 0;
        $item->thumb = '';
        $item->save();

        return to_route('settings.resume_template.index')
            ->with('success', 'You copy the template :name successfully', ['name' => $template->name]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'files' => 'required|mimes:jpg,jpeg,png,svg|max:20000',
        ]);

        $images = [];
        $imagesURL = [];

        if ($request->hasFile('files')) {
            $file = $request->file('files');

            $name = $file->getClientOriginalName();
            $new_name = $name;
            $file->move(public_path('storage/content_media/'), $new_name);
            $imagesURL[] = URL::to('/storage/content_media/'.$new_name);
            $images[] = $new_name;

        }

        return response()->json($imagesURL);
    }

    public function deleteImage(Request $request)
    {
        $input = $request->all();
        $link_array = explode('/', $input['image_src']);
        $image_name = end($link_array);
        $path = public_path('storage/content_media/'.$image_name);

        if (File::exists($path)) {
            File::delete($path);
        }

        return response()->json($image_name);
    }
}
