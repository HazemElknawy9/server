<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
class FaqController extends Controller
{
  public function index()
  {
  	if(request()->ajax())
        {
            return datatables()->of(Faq::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">حذف</button>';
                        return $button;
                    })
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','checkbox'])
                    ->make(true);
        }
    return view('dashboard.faqs.index');   
  }//end of index  
  
	public function create()
	{
	    return view('dashboard.faqs.create');
	}//end of create	 

    public function store(Request $request)
	{
	   $data = $request->all();
	  //return $data;
	   $request->validate([
	        'question' => 'required',
	        'answer' => 'required',
	    ]);

	    $faq = Faq::create($data);
	    session()->flash('success', __('site.added_successfully'));
	    return redirect('dashboard/faqs');
	}//end of store  

	public function edit(Faq $faq)
    {  
        return view('dashboard.faqs.edit', compact('faq'));
    }//end of edit

    public function update(Request $request, Faq $faq)
    {
       $data = $request->all();
       //return $data;
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect('dashboard/faqs');
    }//end of update

    public function destroy($id)
    {
        $data = Faq::findOrFail($id);
       
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    public function faqsDestroyall(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = Faq::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }
}//end of controller
