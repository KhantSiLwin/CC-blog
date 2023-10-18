<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){

     return view('admin.blogs.index',[
        'blogs' => Blog::latest()->paginate(10)
     ]);
    }

    public function create(){

        return view('admin.blogs.create',[
           'categories' => Category::all()
        ]);
       }


       public function store(BlogRequest $request){

       
             $cleanData= $request->validated();

            $cleanData['user_id']= auth()->id();

            $cleanData['photo']=  request()->file('photo')->store('/images');

            Blog::create($cleanData); 
        return redirect()->route('admin.dashboard')->with('success','Blog created successfully');
       }

       public function destory (Blog $blog){

        $blog->delete();
        return redirect()->back()->with('success','Blog deleted successfully');
       }

       public function edit(Blog $blog){

        return view('admin.blogs.edit',[
            'blog' => $blog,
            'categories' => Category::all()
         ]);
       }


       public function update(BlogRequest $request ,Blog $blog){

            $cleanData= $request->validated();

            $blog->update($cleanData); 
        return redirect()->route('admin.dashboard')->with('success','Blog updated successfully');
       }

}
