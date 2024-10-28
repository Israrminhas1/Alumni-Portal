<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::query()
            ->where('id', '<>', auth()->id());

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('userRole', function ($row) {
                    return $row->roles[0]->name;
                })
                ->rawColumns(['userRole'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'role' => 'required|in:'.User::ROLE_CCJPO.','.User::ROLE_ALUMNI.','.User::ROLE_TRAINEE,
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if (empty($input['password'])) {
            unset($input['password']);
        }

        $user = User::updateOrCreate(['id' => $request->id], $input);

        return response()->json(['success' => true, 'message' => 'User has been '.($user->wasRecentlyCreated ? 'updated' : 'created').' successfully.']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success' => true, 'message' => 'User has been deleted successfully.']);
    }
}
