<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Product;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  

    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Category::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">حذف</button>';
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
                    ->addColumn('products_relation', function($data){
                         $button = '<a href="categories-products?category_id='.$data->id.'" id="'.$data->id.'" class="testt btn btn-info">المنتجات المرتبطة</a>';
                        return $button;
                    })
                    ->addColumn('product_count', '<td>{{product_count($id)}}</td>')
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','checkbox','active','inactive','product_count','products_relation','user_active_or_not'])
                    ->make(true);
        }           
        
        return view('dashboard.category.index');
    }//end of index


    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        if ($request->image) {
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/category_images/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }else{
            $data['image'] = 'default.png';
        }
         $slug = str_slug($request->name);
         $data['slug'] = $slug;
        $category = Category::create($data);
        return response(['status'=>true,'success'=>trans('site.added_successfully')],200);
    }//end of store

    public function edit($id)
    {  
        if(request()->ajax())
        {
            $data = Category::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }//end of edit

    public function update(Request $request)
    {
        $data = $request->all();
        $category = Category::findOrFail($request->hidden_id);
        $request->validate([
           'name' => ['required', Rule::unique('categories')->ignore($category->id),],
        ]);
        if ($request->image) {
            if ($category->image != 'default.png') {

                Storage::disk('local')->delete('public/category_images/' . $category->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/category_images/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
           $data = array(
                'name' =>   $request->name,
                'description' =>   $request->description,
                'image'  => $data['image']
            );
        }else{
            $data = array(
               'name' =>   $request->name,
                'description' =>   $request->description,
                //'image'         => $data['image'],
            );
        }
        Category::whereId($request->hidden_id)->update($data);

        return response()->json(['success' => 'تم التعديل بنجاح']);
    }//end of update

    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    public function destroyAll(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = Category::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

    public function categoryActive($status,$id)
    {
        $category =Category::find($id);
        $category->active = $status;
        $category->save();
        if ($status == 1) {
            return response()->json(['success' => 'تم تفعيل الحساب']);
        }else{
            return response()->json(['success' => 'تم تجميد الحساب']);
        }
    }

    //categoryProduct

    public function categoryProduct(Request $request)
    {
                
        if(!empty($_GET['category_id'])){
            $products = Product::where('category_id', $_GET['category_id'])->latest()->get();
        }else{

         $products = Product::latest()->get();
        }
        //return $products;
        if(request()->ajax())
        {
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
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','category','checkbox','active','inactive','user_active_or_not'])
                    ->make(true);
        }          
        $category = DB::table('categories')
        ->select("*")
        ->get();
        return view('dashboard.category.category_products',compact('category'));
    }//end of index

   
}//end of controller
