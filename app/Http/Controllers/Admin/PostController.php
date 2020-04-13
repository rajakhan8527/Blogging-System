<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogUser;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use validate;
use Exception;
use Validator;
use Session;
use DB;
use File;
use Image;


class PostController extends Controller
{
    //
    public function create($id)
    {
        $categories=Category::get();
        return view('admin.post.form', compact('id','categories'));
    }
    // public function index($id)
    // {
    //     $records = Post::select('posts.*', 'categories.category')
    //     ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
    //     ->where('posts.uid', $id)
    //     ->get();    
    //     return view('admin.post.index', compact('id','records'));
    // }

    public function save(Request $request)
    {

        $lastid = DB::table('posts')->orderby('id', 'DESC')->first();
        if(!$lastid){
            //user is not found 
            $lid= 1;
        }
        else{
                // user found 
            $lid= $lastid->id + 1;
        }
        
        $data = $request->all();

                $this->validate($request, [
                    'title' => 'required|max:40|min:3',
                    'author' => 'required|max:30|min:3',
                    'category_id' => 'required',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',                    
                    'description' => 'required'                
                    
                ]);
                 
                                    $image = '';
                                    if($request->hasFile('image'))    
                                    {
                                    $file = $request->file('image');
                                    $filename = $file->getClientOriginalName(); 
                                    $extesion = $file->getClientOriginalExtension();
                                    if($extesion=='jpeg' || $extesion=='JPEG' || $extesion=='JPG' || $extesion=='jpg' || $extesion=='PNG' || $extesion=='png')
                                    {
                                        $image = $lid.uniqid().$filename;
                                        $destinationPath = public_path('/upload/post');
                                        $file->move($destinationPath, $image);
                                    }
                                    else
                                    {
                                        $request->session()->flash('alert-danger', "Image's Extension is not valid, Please upload the jpeg, jpg and png file only");
                                        return redirect()->back();
                                    }
                                    }  
                                
                        
                                    try{
                        
                                                            $post = new Post();  
                                                            $post->uid = $request->uid;                                                   
                                                            $post->title = $request->title;
                                                            $post->author = $request->author;
                                                            $post->category_id = $request->category_id;
                                                            $post->image = $image;
                                                            $post->description = $request->description;                                                          
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
        $categories=Category::get();
        $update = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('update', 'categories'));
    }                                    
      
    public function update(Request $request)
    {
        $data = $request->all();

            $this->validate($request, [
                'title' => 'required|max:40|min:3',
                'author' => 'required|max:30|min:3',
                'category_id' => 'required',                                    
                'description' => 'required'
                 
            ]);
 
        
        try{
         if($request->hasFile('image'))    
         {
            $oldimage = Post::where('id', $data['pid'])->value('image');
            $fullpath = public_path('upload/post/').$oldimage;
                        
            File::delete($fullpath);

            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); 
            $extesion = $file->getClientOriginalExtension();
            if($extesion=='jpeg' || $extesion=='JPEG' || $extesion=='JPG' || $extesion=='jpg' || $extesion=='PNG' || $extesion=='png')
            {
               $image = $data['pid'].uniqid().$filename;
               $destinationPath = public_path('/upload/post');
               $file->move($destinationPath, $image);
            }
            else
            {
               $request->session()->flash('alert-danger', "Image's Extension is not valid, Please upload the jpeg, jpg and png file only");
               return redirect()->back();
            }
         }
         else
         {
            $image = Post::where('id', $data['pid'])->value('image');
         }
        

        $data=$request->all();
        Post::where('id', $data['pid'])->update([
            'title' =>$data['title'],
            'author' =>$data['author'],
            'category_id' =>$data['category_id'],
            'image' =>$image,         
            'description' =>$data['description']
                   
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
            $oldimage = Post::where('id', $id)->value('image');
            $fullpath = public_path('upload/post/').$oldimage;
                        
            File::delete($fullpath);
            Post::where('id', $id)->delete();
            
            $request->session()->flash('alert-success', 'Data Deleted Successfuly');
            return redirect()->back();
        }
            catch(Exeption $e)
            {
                $request->session()->flash('alert-danger', 'Data Failed');
                return redirect()->back();
            }
    }

    //Manage Post
    public function indexcomment($id)
    {
        $records = Comment::where('pid', $id)->get();
        return view('admin.comment.index', compact('id','records'));
    }

}