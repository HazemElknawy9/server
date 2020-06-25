<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RoleSite;
use App\Permission;
use DB;
class RollSiteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:read_roles')->only(['index']);
    //     $this->middleware('permission:create_roles')->only(['create', 'store']);
    //     $this->middleware('permission:update_roles')->only(['edit', 'update']);
    //     $this->middleware('permission:delete_roles')->only(['destroy']);

    // }// end of __construct


    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(RoleSite::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->rawColumns(['action','checkbox'])
                    ->make(true);
        }
        return view('dashboard.rolesite.index');
    }

    public function create()
    {
        return view('dashboard.rolesite.create');
    }//end of create

    public function store(Request $request, RoleSite $roleSite)
    {

        $data = $request->all();
        $request->validate([
            'name' => 'required|unique:role_sites',
        ]);
        $roleSite = new RoleSite;
        $roleSite->name = $data['name'];
        $roleSite->ar_name = $data['ar_name'];
        $roleSite->save();
        $roleSite_id = DB::getPdo()->lastInsertId();
        $maps = ['create_'.$data['name'], 'read_'.$data['name'], 'update_'.$data['name'], 'delete_'.$data['name']];
        $permissionCount = Permission::where('name','create_'.$data['name'])->count();
        if ($permissionCount > 0) {
        
        }else{
            foreach ($maps as $map) {
                $permission = new Permission;
                $permission->roleSite_id = $roleSite_id;
                $permission->name = $map;
                $permission->display_name = $map;
                $permission->name = $map;
                $permission->save();
            }
        }
           
        return response()->json(['success' => 'تمت الاضافة بنجاح']);   
    }
    

    

    public function destroy($id)
    {
        $data = RoleSite::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy



    public function destroyAll(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = RoleSite::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

}
