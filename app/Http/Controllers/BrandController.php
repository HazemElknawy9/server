<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use DB;
use Auth;
class BrandController extends Controller
{
    public function brands()
    {  
      if (Auth::check() && auth()->user()->active == 1) {
        return view('brands');
      }else{
        return redirect('/active/account')->with('flash_message_error','Your account is not activated! Please confirm your Phone to activate.'); 
      }  
    }// end of index

     // load more
    function brand_load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = User::with('products')
          ->whereRoleIs('admin')
          ->where('id', '<', $request->id)
          ->whereRoleIs('admin')
          ->orderBy('id', 'DESC')
          ->limit(8)
          ->get();
      }
      else
      {
       $data = User::with('products')
       	  ->whereRoleIs('admin')
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
       		$output .= '<div class="col-md-3">
            <div class="card mb-3">
              <div class="card-brands-img">
                <img src="'.\URL::to('/').'/storage/vendor_profile/'.$row->image.'" class="card-img-top" alt="Adidas">

              </div>
              <div class="card-body text-center">
                <h5 class="card-title">'.$row->first_name.'</h5>
                <p class="card-text">'.$row->products->count().' Product</p>
              </div>
            </div>
          </div>';   
        $last_id = $row->id;
       }
       	$output .= '
	       <div id="load_more" style="display: contents;" >
	        <button type="button" name="brand_load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="brand_load_more_button">Load More</button>
	       </div>
	    ';
      }
      else
      {
       $output .= '
       <div id="load_more"  style="display: contents;">
        <button type="button" name="brand_load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }
}//end of controller
