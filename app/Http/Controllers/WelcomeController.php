<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {

    	$products = Product::latest()->paginate(5);
    	//return $products;
        return view('welcome',compact('products'));
    }// end of index

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->active == ''){
                    return redirect('/active/account')->with('flash_message_error','Your account is not activated! Please confirm your Phone to activate.');    
                }

                return redirect('/dashboard/welcome');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
            }
        }
    }
    public function activeAccount(Request $request)
    {
	    if ($request->isMethod('post')) {
	      $data = $request->all();
	      $userId = Auth::user()->id;
	       $user = User::where('id',$userId)->where('code',$request->code)->count();
	      if ($user > 0) {
	        User::where(['id'=>$userId])->update(['active'=>1,'history_email'=>Auth::user()->email,'history_phone'=>Auth::user()->phone]);
	        if (Auth::check() && auth()->user()->hasRole('admin')) {
	        	return redirect('/dashboard')->with('flash_message_success','Your Account Has Been Complete Verification Your Id Number Is : '.Auth::user()->number_id);
	        }else{
	        	return redirect('/')->with('flash_message_success','Your Account Has Been Complete Verification Your Id Number Is : '.Auth::user()->number_id);	
	        }
	        
	      }else{
	        return redirect()->back()->with('flash_message_error','In Valied Code');
	      }
	    }

	    $userId = Auth::user()->id;
	    $user = User::where('id',$userId)->where('active','=',1)->count();
	    if ($user > 0) {
	        User::where(['id'=>$userId])->update(['history_email'=>Auth::user()->email]);	
	        if (Auth::check() && auth()->user()->hasRole('admin')) {
	        	return redirect('/dashboard')->with('flash_message_success','Your Account Has Been Complete Verification Your Id Number Is : '.Auth::user()->number_id);
	        }else{
	        	return redirect('/')->with('flash_message_success','Your Account Has Been Complete Verification Your Id Number Is : '.Auth::user()->number_id);	
	        }
	    }else{
	      return view('active_account');   
	    }   
    }

    // load more
    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = DB::table('products')
          ->where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(8)
          ->get();
      }
      else
      {
       $data = DB::table('products')
          ->orderBy('id', 'DESC')
          ->limit(8)
          ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)  
       {
       	if (Auth::check() && auth()->user()->active == 1) {
       		$output .= '<div class="col-md-3">
                        <a href="'.\URL::to('/').'/storage/files/'.$row->catalog.'" download><img class="img-sale-pdf" src="'.\URL::to('/').'/storage/icon/pdf.png"></a>  
	            		<img src="'.\URL::to('/').'/storage/products_image/'.$row->image.'" 
                      class="card-img-top" alt="">
                      <div class="card-body card-Product-body ">
                        
                        <div class="card-body-2 title-p">
                            <div>
                                '.$row->name.'

                            </div>
                            <div class="rating-stars text-right">
                                <ul id="stars">
                                  <li class="star selected" title="Poor" data-value="1">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                  </li>
                                  <li class="star selected" title="Fair" data-value="2">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                  </li>
                                  <li class="star" title="Good" data-value="3">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                  </li>
                                  <li class="star" title="Excellent" data-value="4">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                  </li>
                                  <li class="star" title="WOW!!!" data-value="5">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                  </li>
                                </ul>
                             </div>
                        </div>
                        <div class="card-body-2 price">
                            <div>
                                PRICE :<span>'.$row->price.'</span>  

                            </div>
                            <div class="text-right"> 
                                
                                QUANTITY
                            </div>
                        </div>
                        <div class="card-body-2 price">
                            <div>
                                COMMISSION : <span>'.$row->commission.' LE</span>

                            </div>
                            <div class="text-right">
                               <span >'.$row->stock.'</span>
                            </div>
                        </div>
                   
                   
                  </div>
                </div>
       		';                 
       	}else{	
	        $output .= '<div class="col-md-3">
                        <img class="img-sale-pdf" src="'.\URL::to('/').'/storage/icon/pdf.png"  data-toggle="modal" data-target="#exampleModal">  
	            		<img src="'.\URL::to('/').'/storage/products_image/'.$row->image.'" 
                      class="card-img-top" alt="">
                      <div class="card-body card-Product-body ">
                        
                        <div class="card-body-2 title-p">
                            <div>
                                '.$row->name.'

                            </div>
                            <div class="rating-stars text-right">
                                <ul id="stars">
		                            <li class="star" title="Poor" data-value="1">
		                              <i class="fa fa-star fa-fw"></i>
		                            </li>
		                            <li class="star" title="Fair" data-value="2">
		                              <i class="fa fa-star fa-fw"></i>
		                            </li>
		                            <li class="star" title="Good" data-value="3">
		                              <i class="fa fa-star fa-fw"></i>
		                            </li>
		                            <li class="star" title="Excellent" data-value="4">
		                              <i class="fa fa-star fa-fw"></i>
		                            </li>
		                            <li class="star" title="WOW!!!" data-value="5">
		                              <i class="fa fa-star fa-fw"></i>
		                            </li>
	                            </ul>
                             </div>
                        </div>
                        <div class="card-body-2 price">
                            <div>
                                PRICE :<span>'.$row->price.'</span>  

                            </div>
                            <div class="text-right"> 
                                
                                QUANTITY
                            </div>
                        </div>
                        <div class="card-body-2 price">
                            <div>
                                COMMISSION : <span>'.$row->commission.' LE</span>

                            </div>
                            <div class="text-right">
                               <span >'.$row->stock.'</span>
                            </div>
                        </div>
                   
                   
                  </div>
                </div>
       		';
	    }    
        $last_id = $row->id;
       }
       if (Auth::check()) {
       	$output .= '
	       <div id="load_more" style="display: contents;" >
	        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
	       </div>
	    ';
       }else{
       		$output .= '
		       <div style="display: contents;" >
		        <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#exampleModal">Load More</button>
		       </div>
		    ';
       }
      }
      else
      {
       $output .= '
       <div id="load_more"  style="display: contents;">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }
}//end of controller

// $output .= '
//        <div id="load_more"  style="display: contents;" >
//         <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
//        </div>
//        ';

// $output .= '
//        <div style="display: contents;" >
//         <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#exampleModal">Load More</button>
//        </div>
//        ';

// ' <a href="'.Storage::disk('public')->url('products_image/'.$row->catalog).'" download><img class="img-sale-pdf" src="'.Storage::disk('public')->url('icon/pdf.png').'"></a>' 