<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use DB;
class AffiliateController extends Controller
{


    public function __construct()
    {
        //create read update delete
        $this->middleware(['role:super_admin'])->only('index');
        $this->middleware(['role:super_admin'])->only('show');
        $this->middleware(['role:super_admin'])->only('destroy');
        $this->middleware(['role:super_admin'])->only('vendorActive');
    }

    public function index(Request $request)
    {
        
        if(request()->ajax())
        {
            return datatables()->of(User::whereRoleIs('affiliate')->latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="'.\URL::current().'/'.$data->id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" num="'.$data->first_name.'"  name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                        return $button;
                    })
                    ->addColumn('user_active_or_not', function($data){
                        if ($data->active == 1) {
                            $button = '<label class="label zoma label-success">مفعل  </label>';
                        }else{
                            $button = '<label class="label zoma label-danger">مجمد  </label>';
                        }
                        return $button;
                    })
                    ->addColumn('inactive', function($data){
                        if ($data->active == 1) {
                            $button = '<div class="actions"><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-small bootstrap-switch-animate bootstrap-switch-off" style="width: 84px;"><div class="bootstrap-switch-container'.$data->id.'" style="width: 123px; margin-left: 0px;"><span id='.$data->id.' class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 41px;">ON</span><span id='.$data->id.' class="bootstrap-switch-success bootstrap-switch-label" style="width: 41px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-warning" id='.$data->id.' style="width: 41px;">OFF</span><input type="checkbox" class="make-switch" checked="" data-on="success" data-on-color="success" data-off-color="warning" data-size="small"></div></div> </div>';
                        }else{
                           $button = '<div class="actions"><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-small bootstrap-switch-animate bootstrap-switch-off" style="width: 84px;"><div class="bootstrap-switch-container'.$data->id.'" style="width: 123px; margin-left: -41px;"><span id='.$data->id.' class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 41px;">ON</span><span id='.$data->id.' class="bootstrap-switch-warning  bootstrap-switch-label" style="width: 41px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-warning" id='.$data->id.' style="width: 41px;">OFF</span><input type="checkbox" class="make-switch" checked="" data-on="success" data-on-color="success" data-off-color="warning" data-size="small"></div></div> </div>';
                        }
                        return $button;
                    })
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','checkbox','active','inactive','user_active_or_not'])
                    ->make(true);
        }                       
        return view('dashboard.affiliate.index');

    }//end of index


    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('dashboard.affiliate.show',compact('data'));
    }

    


    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    function destroyAll(Request $request)
    {
        $vendor_id_array = $request->input('id');
        $vendor = User::whereIn('id', $vendor_id_array);
        if($vendor->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

    public function affiliateActive($status,$id)
    {
        $user =User::find($id);
        $user->active = $status;
        $user->save();
        if ($status == 1) {
            return response()->json(['success' => 'تم تفعيل الحساب']);
        }else{
            return response()->json(['success' => 'تم تجميد الحساب']);
        }
    }

}//end of controller
