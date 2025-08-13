<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //this method will show roles
    public function index(){
        $roles = Role::orderBy('created_at','desc')->paginate(10);
        return view('roles.index',compact('roles'));

    }
    //this method will create roles
    public function create(Request $request){
        return view('roles.create');
    }
    //this method will insert roles in DB
    public function store(Request $request){
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:roles,name',
        ]);

        try {
            Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);
            return redirect()->route('role.index')->with('success', 'role created successfully');
        } catch (\Exception $e) {
            return redirect()->route('role.create')
                ->withInput()
                ->withErrors(['name' => $e->getMessage()]);
        }

    }
    //this method will edit roles
    public function edit($id){
        $role = Role::findOrFail($id);
        return view('roles.edit',compact('role'));
    }
    //this method will update roles
    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:roles,name,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('role.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('role.index')
            ->with('success', 'role updated successfully');
    }

    //this method will delete roles
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()
            ->route('role.index')
            ->with('success', 'role deleted successfully');
    }
}
