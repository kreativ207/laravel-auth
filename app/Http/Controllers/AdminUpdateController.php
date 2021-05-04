<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUpdateController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        $dataRole = [
            1 => "Admin",
            2 => "Super admin"
        ];

        return view('admin_update', [
            'dataUser' => $dataUser,
            'dataRole' => $dataRole
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user);
        if(!$user) {
            return abort(404);
        }
        $group = (int)$request->group;
        if(!is_int($group)) {
            return abort(404);
        }

        $data = $request->only(['group']);
        $user->group = $group;
        $user->save();

        return redirect()->route('admin_update');

    }
}
