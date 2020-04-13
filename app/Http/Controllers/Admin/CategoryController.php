<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use validate;
use Exception;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.form');
    }

    public function index()
    {
        $records=Category::get();
        return view('admin.category.index', compact('records'));
    }

    public function save(Request $request)
    {
    $data=$request->all();
       $this->validate($request, [
           'category'=>'required',        
           'status'  =>'required'
       ]);
      if(!empty($data))
      {
        try{
            $cat = new Category();
            $cat->category=$data['category'];            
            $cat->status=$data['status'];
            $cat->save();
        }
            catch(Exception $e)
            {
                $request->session()->flash('alert-danger', 'Something Else' . $e);
                return redirect()->back();
            }  
        $request->session()->flash('alert-success', 'Data Successfuly Inserted');
        return redirect()->back();
      }
       
    }

    public function edit($id)
    {
        $update = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('update'));
    }

    public function update(Request $request)
    {
        $data=$request->all();
        $this->validate($request, [
            'category'=>'required',           
            'status'  =>'required'
        ]);
    try{
        Category::where('id', $data['catid'])->update([
                                    'category'=>$data['category'],                                   
                                    'status'  =>$data['status']
        ]);
        $request->session()->flash('alert-success', 'Data Successfully Update');
       }catch(\Exception $e)
       {
         $request->session()->flash('alert-danger', 'Data Failed');
         return redirect()->back();
       }
       return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        try{
            $delete = Category::where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Data successfuly delete');
            return redirect()->back();
           }
           catch(\Exception $e)
           {
             $request->session()->flash('alert-danger', 'Data failed');
             return redirect()->back();
           }
           
    }

}
