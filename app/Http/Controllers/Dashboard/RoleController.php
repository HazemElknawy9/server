<?php

namespace App\Http\Controllers\Dashboard;

use App\Role;
use App\RoleSite;
use App\Crud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        //create read update delete
        // $this->middleware(['permission:read_roles'])->only('index');
        // $this->middleware(['permission:create_roles'])->only('create');
        // $this->middleware(['permission:update_roles'])->only('edit');
        // $this->middleware(['permission:delete_roles'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
        if(request()->ajax())
        {
            return datatables()->of($roles = Role::whereRoleNot('super_admin')->with(['permissions'])->withCount('users')->latest()->get())
                    ->addColumn('action', function($data){
                        $button  = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    //->addColumn('permissions', 'dashboard.roles.permissions')
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->rawColumns(['action','checkbox'])
                    ->make(true);
        }

        return view('dashboard.roles.index');

    }//end of index

    public
    function create()
    {
        $cruds = Crud::all();
        $roleSite = RoleSite::all();
        return view('dashboard.roles.create', compact('roleSite','cruds'));
    }//end of create

    public
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();

        //dd($request_data->permissions);
        $role = role::create($request_data);
        $role->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.roles.index');

    }//end of store

    public
    function edit(role $role)
    {
        $cruds = Crud::all();
        $roleSite = RoleSite::all();
        return view('dashboard.roles.edit', compact('role','roleSite','cruds'));
    }//end of role

    public
    function update(Request $request, role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->all();


        $role->update($request_data);

        $role->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.roles.index');

    }//end of update

    

    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy



    public function destroyAll(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = Role::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

}//end of controller
