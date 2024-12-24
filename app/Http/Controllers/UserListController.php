<?php

namespace App\Http\Controllers;

use App\Exports\UserListExport;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class UserListController extends Controller
{
    public function index()
    {
        if(request('name')){
            User::firstWhere('id', request(('name')));
        }

        $sort = request()->query('sort', 'id');
        $direction = request()->query('direction', 'asc');

        $tables = User::query()
            ->leftJoin('role_has_permissions', 'users.id', '=', 'role_has_permissions.role_id')
            ->leftJoin('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->distinct()
            ->orderBy($sort === 'role' ? 'roles.name' : $sort, $direction)
            ->filter(request(['search', 'name', 'role']))
            ->paginate(10)
            ->withQueryString();

        return view('userlist.main', [
            'title' => 'Users List',
            'search' => 'users-list',
            'export' => 'exportUsersList',
            'users' => $tables
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'image|file|max:2048',
            'role' => 'required'
        ]);

        if ($request->password == 'password'){
            $validatedData['password'] = bcrypt($request->password);
        }

        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images/users');
        } 

        $user = User::create($validatedData);
        $user->assignRole($request->role);

        $role = Role::findByName($request->role);
        $permissions = $role->permissions;
        foreach ($permissions as $permission) {
            $user->givePermissionTo($permission);
        }

        return redirect('/users-list')->with('success', 'Data has been added!');
    }

    public function destroy(User $user)
    {
        try {
            User::destroy($user->id);

            return redirect('/users-list')->with('success', 'Data has been deleted!');
        } catch (\Throwable $th) {
            return redirect('/users-list')->with('error', 'Data cannot Delete');
        }
    }

    public function export()
    {
        return Excel::download(new UserListExport, 'userlist.xlsx');
    }
}
