<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class boloController extends Controller
{
    public function writePost()
    {
        return view('post.writePost');
    }
    public function AddCategory()
    {
        return view('post.add_category');
    }

    public function StoreCategory(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25| min:4',
        'slug' => 'required|unique:categories|max:25| min:4',
        
    ]);
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
      if($category){
        $notification = array(
            'message' => 'Successfully created Inrsert!',
            'alert-type' => 'success'
        );
        
        return Redirect()->back()->with($notification);
      }else{
        $notification  =array(
            'message' => 'Something went wrong',
            'alert-type' => 'error'
          );
          return Redirect()->back()->with($notification);
      }
    }

    //allCategory method create for get all category list here
    public function AllCategory()
    {
      $category = DB::table('categories')->get();
      
      return view('post.all_category',compact('category'));
    }
}
