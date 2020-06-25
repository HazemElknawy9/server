<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Http\Requests\VendorRequest;
use App\Helpers\UploadFiles;
use DB;
class VendorController extends Controller
{

    protected $uploadFiles;

    public function __construct(UploadFiles $uploadFiles)
    {
        $this->uploadFiles = $uploadFiles;

        //create read update delete
        $this->middleware(['role:super_admin'])->only('index');
        $this->middleware(['role:super_admin'])->only('create');
        $this->middleware(['role:super_admin'])->only('edit');
        $this->middleware(['role:super_admin'])->only('destroy');
        $this->middleware(['role:super_admin'])->only('vendorActive');
    }

    public function index(Request $request)
    {
        
        if(request()->ajax())
        {
            return datatables()->of(User::whereRoleIs('admin')->latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
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
        return view('dashboard.vendor.index');

    }//end of index

    public function create()
    {
        return view('dashboard.vendor.create');

    }//end of create

    public function store(VendorRequest $request)
    {
        try {
            $request_data = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);
            if ($request->image) {
                $request_data['image'] = $this->uploadFiles->uploadImage($request->image,'vendor_profile');
            }
            $user = User::create($request_data);
            $user->attachRole('admin');
            
            session()->flash('success', __('site.added_successfully'));
            return redirect()->route('dashboard.vendors.index');
        } catch (\Exception $ex) {
            return redirect()->route('dashboard.vendors.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }        
    }//end of store

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.vendor.edit',compact('user'));
    }//end of edit  

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // return $data;
        $user = User::findOrFail($id);
         $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        if ($request->image) {
            if ($user->image != 'default.png') {

                Storage::disk('local')->delete('public/vendor_profile/' . $user->image);
            }//end of inner if
           $data['image'] = $this->uploadFiles->uploadImage($request->image,'vendor_profile');
        }
        $user->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.vendors.index');
 
    }//end of update

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        if ($data->image != 'default.png') {

            Storage::disk('local')->delete('public/vendor_profile/' . $data->image);
        }//end of inner if
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    function destroyAll(Request $request)
    {
        $vendor_id_array = $request->input('id');
        $vendor = User::whereIn('id', $vendor_id_array);
        // how to delete image from storage ?????????????????????????????????????????????
        if($vendor->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

    public function vendorActive($status,$id)
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
