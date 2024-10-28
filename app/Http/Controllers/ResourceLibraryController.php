<?php

namespace App\Http\Controllers;

use App\Models\ResourceLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ResourceLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $resources = ResourceLibrary::query();

        if ($request->ajax()) {
            return DataTables::of($resources)
                ->addIndexColumn()
                ->make(true);
        }

        if (auth()->user()->hasRole('admin')) {
            return view('resource_library.index');
        } else {
            $resources = $resources->latest()->paginate();
            return view('resource_library.list', compact('resources'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|min:3',
            'type' => 'required|in:pdf,docx,video',
            'file' => 'required|file|mimes:pdf,docx,mp4',
        ]);

        if ($request->hasFile('file')) {
            $input['file'] = $request->file('file')->store('resources');
        }

        $input['created_by'] = auth()->id();

        $resource = ResourceLibrary::updateOrCreate(['id' => $request->id], $input);

        return response()->json(['success' => true, 'message' => 'Resource has been '.($resource->wasRecentlyCreated ? 'updated' : 'uploaded').' successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ResourceLibrary $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResourceLibrary $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResourceLibrary $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceLibrary $resource)
    {
        if (Storage::disk('private')->exists($resource->file)) {
            Storage::disk('private')->delete($resource->file);
        }
        $resource->delete();

        return response()->json(['success' => true, 'message' => 'Resource has been deleted successfully.']);

    }
}
