<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogUser;
use App\Models\Post;
use App\Models\Category;
use validate;
use Exception;
use Validator;
use Session;
use DB;
use File;
use Image;

class BlogUserController extends Controller
{
    //
    public function create()
    {
        return view('admin.bloguser.form');
    }

    public function index()
    {
        $records=BlogUser::get();
        return view('admin.bloguser.index', compact('records'));
    }

    public function save(Request $request)
    {
        $lastid = DB::table('blogusers')->orderby('id', 'DESC')->first();
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
                    'name'=>'required',                   
                    'email'=>'required|email|unique:users',
                    'password'=>'required|min:6|max:20'                
                    
                ]);
     
         $record = BlogUser::where('email', $data['email'])->first();   
         if(!$record)
         { 
                 
                                    $image = '';
                                    if($request->hasFile('profile_pic'))    
                                    {
                                    $file = $request->file('profile_pic');
                                    $filename = $file->getClientOriginalName(); 
                                    $extesion = $file->getClientOriginalExtension();
                                    if($extesion=='jpeg' || $extesion=='JPEG' || $extesion=='JPG' || $extesion=='jpg' || $extesion=='PNG' || $extesion=='png')
                                    {
                                        $image = $lid.uniqid().$filename;
                                        $destinationPath = public_path('/upload/profile');
                                        $file->move($destinationPath, $image);
                                    }
                                    else
                                    {
                                        $request->session()->flash('alert-danger', "Profile Pic's Extension is not valid, Please upload the jpeg, jpg and png file only");
                                        return redirect()->back();
                                    }
                                    }  
                                
                        
                                    try{
                        
                                                            $obj = new BlogUser();                                                          
                                                            $obj->name=$data['name'];                                                                                                                       
                                                            $obj->email=$data['email'];
                                                            $obj->password=Hash::make($data['password']);                                                           
                                                            $obj->profile_pic=$image;                                                          
                                                            $obj->save();
                                
                                            $request->session()->flash('alert-success', 'Data Successfully Inserted');
                        
                                    }
                                        catch(Exception $e)
                                        {
                                            $request->session()->flash('alert-danger', 'Data Failed');
                                            return redirect()->back();
                                        }
                                return redirect()->back();       
 
         }
         else
         {
            $request->session()->flash('alert-danger', 'Email ID is already Exist');
            return redirect()->back();
         }
        
    }
    public function edit($id)
    {
        
        $update = BlogUser::where('id', $id)->first();
        return view('admin.bloguser.edit', compact('update'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

            $this->validate($request, [
                'name'=>'required',                   
                'email'=>'required|email|unique:users'
                 
            ]);
 
        
        try{
         if($request->hasFile('profile_pic'))    
         {
            $oldprofile = BlogUser::where('id', $data['uid'])->value('profile_pic');
            $fullpath = public_path('upload/profile/').$oldprofile;
                        
            File::delete($fullpath);

            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName(); 
            $extesion = $file->getClientOriginalExtension();
            if($extesion=='jpeg' || $extesion=='JPEG' || $extesion=='JPG' || $extesion=='jpg' || $extesion=='PNG' || $extesion=='png')
            {
               $profilepic = $data['uid'].uniqid().$filename;
               $destinationPath = public_path('/upload/profile');
               $file->move($destinationPath, $profilepic);
            }
            else
            {
               $request->session()->flash('alert-danger', "Profile Pic's Extension is not valid, Please upload the jpeg, jpg and png file only");
               return redirect()->back();
            }
         }
         else
         {
            $profilepic = BlogUser::where('id', $data['uid'])->value('profile_pic');
         }
        

        $data=$request->all();
        BlogUser::where('id', $data['uid'])->update([
                             'name'=>$data['name'],            
                             'email'=>$data['email'],                                     
                             'profile_pic'=>$profilepic           
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
            $oldprofile = BlogUser::where('id', $id)->value('profile_pic');
            $fullpath = public_path('upload/profile/').$oldprofile;
                        
            File::delete($fullpath);
            BlogUser::where('id', $id)->delete();
            
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
    public function indexpost($id)
    {
        $records = Post::select('posts.*', 'categories.category')
        ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
        ->where('posts.uid', $id)
        ->get(); 
        //$records=Post::get();
        return view('admin.post.index', compact('id','records'));
    }

}
