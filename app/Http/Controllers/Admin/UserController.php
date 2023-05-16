<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index(Request $request)
    {
        $search =trim($request->get('search'));
        $users = User::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->latest('id')
            ->paginate(5);
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $roles_user = [];
        foreach ($user->roles as $role_user){
            array_push($roles_user, $role_user->id);
        }
        return view('admin.users.edit',compact('user', 'roles', 'roles_user'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);


        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }
}
