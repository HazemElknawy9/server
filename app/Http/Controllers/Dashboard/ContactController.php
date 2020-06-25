<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResponseContact;

class ContactController extends Controller
{
  public function index()
  {
  	if(request()->ajax())
        {
            return datatables()->of(Contact::latest()->get())
                    ->addColumn('action', function($data){
                    	$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">رد</button>';
                        $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">حذف</button>';
                        return $button;
                    })
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->rawColumns(['action','checkbox'])
                    ->make(true);
        }
        return view('dashboard.contact.index');
  }//end of index    

  public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Contact::findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }//end of edit

    public function update(Request $request)
    {

        $form_data = array(
            'response' =>   $request->response,
        );

         Contact::whereId($request->hidden_id)->update($form_data);
         $form_data = Contact::where('email',$request->email)->first();
         //return $form_data;
            Notification::route('mail',$request->email)
             ->notify(new ResponseContact($form_data));
        
        return response()->json(['success' => 'تم ارسال الرسالة بنجاح']);

    }//end of update

    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    public function destroyAll(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = Contact::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }
    
}//end of controller
