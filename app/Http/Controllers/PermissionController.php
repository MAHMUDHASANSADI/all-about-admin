<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //this method will show permissions
    public function index(){
        $permissions = Permission::orderBy('created_at','desc')->paginate(10);
        return view('permissions.index',compact('permissions'));

    }
    //this method will create permissions
    public function create(Request $request){
        return view('permissions.create');
    }
    //this method will insert permissions in DB
    public function store(Request $request){
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:permissions,name',
        ]);

        try {
            Permission::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);
            return redirect()->route('permission.index')->with('success', 'Permission created successfully');
        } catch (\Exception $e) {
            return redirect()->route('permission.create')
                ->withInput()
                ->withErrors(['name' => $e->getMessage()]);
        }

    }
    //this method will edit permissions
    public function edit(Request $request){

    }
    //this method will update permissions
    public function update(Request $request){

    }
    //this method will delete permissions
    public function destroy(Request $request){

    }
}
