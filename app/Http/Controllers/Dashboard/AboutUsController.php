<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
class AboutUsController extends Controller
{
  public function index()
  {
    if(request()->ajax())
        {
            return datatables()->of(About::where('id',1)->get())
            ->addColumn('action', function($data){
                $button = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    return view('dashboard.about.index');   
  }//end of index  
     

	public function edit($id)
    {  
        $about = About::FindOrFail($id);
        return view('dashboard.about.edit', compact('about'));
    }//end of edit

    public function update(Request $request, About $about)
    {
       $data = $request->all();
       //return $data;
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $about->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect('dashboard/about-us');
    }//end of update
}//end of controller
