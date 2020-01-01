<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PostController extends Controller
{
   public function writePost()
    {
    	$category=DB::table('categories')->get();
    	return view('post.writepost',compact('category'));
    }
    public function StorePost(Request $request)
    {
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
         ]);
    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Successfully created Inrsert!',
                'alert-type' => 'success'
            );
            
            return Redirect()->Route('all.post')->with($notification);
    	}else{ 
    		 DB::table('posts')->insert($data);
             $notification = array(
                'message' => 'Successfully created Inrsert!',
                'alert-type' => 'success'
            );   
            return Redirect()->Route('all.post')->with($notification);
    	}
    }

    public function AllPost(){

        //$allPost = DB::table('posts')->get();
        $allpost= DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')->get();
        return view('post.all_post', compact('allpost'));
    }
    public function ViewPost($id){
        $single_post= DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->where('posts.id', $id)
        ->first();
        return view('post.view_post', compact('single_post'));
    }
    public function DeltePost($id){
        $post=DB::table('posts')->where('id', $id)->first();
        $image=$post->image;
         $postDelete = DB::table('posts')->where('id', $id)->delete();
        if($postDelete){
            unlink($image);
            $notification = array(
                'message' => 'Post Deleted Successfull',
                'alert-type' => 'success'
            );
 
            return Redirect()->back()->with($notification);
          } 
    }
    public function EditPost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('post.edit_post', compact('category', 'post'));
    }

    public function UpdatePost(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
       $data=array();
       $data['title']=$request->title;
       $data['category_id']=$request->category_id;
       $data['details']=$request->details;
       $image=$request->file('image');
       if ($image) {
           $image_name=hexdec(uniqid());
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/frontend/image/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
           $data['image']=$image_url;
            unlink($request->old_image );
           DB::table('posts')->where('id', $id)->update($data);
           $notification = array(
               'message' => 'Successfully created Inrsert!',
               'alert-type' => 'success'
           );
           
           return Redirect()->Route('all.post')->with($notification);
       }else{ 
           $data['image']=$request->old_image;
            DB::table('posts')->where('id', $id)->update($data);
            $notification = array(
               'message' => 'Successfully created Inrsert!',
               'alert-type' => 'success'
           );   
           return Redirect()->Route('all.post')->with($notification);
       }
    }

   
}