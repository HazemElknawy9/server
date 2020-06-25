<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Validation\Rule;
use Auth;
use DB;
use App\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(Request $request)
    {
                
        if(request()->ajax())
        {

            if($request->category){
              $products = Product::where('category_id',$request->category)->get();
            }else{
                $products = Product::latest()->get();
            }
            return datatables()->of($products)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" num="'.$data->name.'"  name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
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
                    ->addColumn('category', '<td>{{print_category_name($category_id)}}</td>')
                    ->addColumn('vendor', '<td>{{vendor_name($vendor_id)}}</td>')
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','category','checkbox','vendor','active','inactive','user_active_or_not'])
                    ->make(true);
        }          
        $category = DB::table('categories')
        ->select("*")
        ->get();
        return view('dashboard.products.index',compact('category'));
    }//end of index

    public function create()
    {
       $categories = Category::all();
       $vendors = User::whereRoleIs('admin')->get();
        return view('dashboard.products.create', compact('categories','vendors'));
    }//end of create

   

    public function store(Request $request)
    {
       $data = $request->all();
       $request->validate([
            'category_id' => 'required',
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'minimum_price' => 'required',
            'maximum_price' => 'required',
            'stock' => 'required',
        ]);

      if ($request->image) {
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/products_image/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }

       if ($files = $request->file('catalog')) {
           $destinationPath = public_path().'/storage/files/'; // upload path 
           $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $fileName);
           $data['catalog'] = "$fileName";
        }
      // return $data;
        $product = Product::create($data);
        session()->flash('success', __('site.added_successfully'));
        return redirect('dashboard/products');
    }//end of store

    public function edit(Product $product)
    {  
       $categories = Category::all();
       $vendors = User::whereRoleIs('admin')->get();
        return view('dashboard.products.edit', compact('categories', 'vendors','product'));
    }//end of edit

    public function update(Request $request, Product $product)
    {
       $data = $request->all();
       //return $data;
        $request->validate([
            'category_id' => 'required',
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            //'image' => 'required',
            'price' => 'required',
            'minimum_price' => 'required',
            'maximum_price' => 'required',
            'stock' => 'required',
        ]);
        if ($request->image) {
            if ($product->image != 'default.png') {

                Storage::disk('local')->delete('public/products_image/' . $product->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/products_image/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }
        if ($files = $request->file('catalog')) {
            unlink(public_path().'/storage/files/'.$product->catalog);
           $destinationPath = public_path().'/storage/files/'; // upload path 
           $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $fileName);
           $data['catalog'] = "$fileName";
        }
        $product->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect('dashboard/products');
    }//end of update

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if ($data->image != 'default.png') {

            Storage::disk('local')->delete('public/products_image/' . $data->image);
        }//end of inner if
        unlink(public_path().'/storage/files/'.$data->catalog);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    function productsDestroyall(Request $request)
    {
        $productsIds = $request->input('id');
        $products = Product::whereIn('id', $productsIds)->get();
        foreach ($products as $product) {
            $image = $product->image;
            if($product->delete()){
                Storage::disk('local')->delete('public/products_image/' . $image);
            }
        }
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }

    public function ProductActive($status,$id)
    {
        $user =Product::find($id);
        $user->active = $status;
        $user->save();
        if ($status == 1) {
            return response()->json(['success' => 'تم تفعيل الحساب']);
        }else{
            return response()->json(['success' => 'تم تجميد الحساب']);
        }
    }

}//end of controller
