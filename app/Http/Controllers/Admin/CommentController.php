<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use validate;
use Exception;
use Validator;


class CommentController extends Controller
{
    //
    public function create($id)
    {        
        return view('admin.comment.form', compact('id'));
    }

    public function save(Request $request)
    {
                $this->validate($request, [                                      
                    'comment' => 'required'                
                    
                ]);
                               
                                    try{
                        
                                                            $post = new Comment();  
                                                            $post->pid = $request->pid;                                                    
                                                            $post->comment = $request->comment;                                                          
                                                            $post->save();
                                
                                            $request->session()->flash('alert-success', 'Data Successfully Inserted');
                        
                                    }
                                        catch(Exception $e)
                                        {
                                            $request->session()->flash('alert-danger', 'Data Failed');
                                            return redirect()->back();
                                        }
                                return redirect()->back();       
 
       
        
    }
    public function edit($id)
    {
        $update = Comment::where('id', $id)->first();    
        return view('admin.comment.edit', compact('update'));
    }                                    
      
    public function update(Request $request)
    {
     

            $this->validate($request, [                                    
                'comment' => 'required'
                 
            ]);
 
        
        try{
  
        $data=$request->all();
        Comment::where('id', $data['cid'])->update([                  
            'comment' =>$data['comment']                   
        ]);

            $request->session()->flash('alert-success', 'Data Successfuly Updated');
            return redirect()->back();
        }
            catch(Exception $e)
            {
                $request->session()->flash('alert-danger', 'Data Failed');
                return redirect()->back();
            }
        
    }
    public function destroy(Request $request, $id)
    {
        try{
            Comment::where('id', $id)->delete();
            
            $request->session()->flash('alert-success', 'Data Deleted Successfuly');
            return redirect()->back();
        }
            catch(Exeption $e)
            {
                $request->session()->flash('alert-danger', 'Data Failed');
                return redirect()->back();
            }
    }
}
