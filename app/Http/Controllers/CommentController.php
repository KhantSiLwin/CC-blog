<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    
    public function store(Blog $blog){

        $cleanData = request()->validate([
            'body'=> 'required'
        ]);

      
        $cleanData['user_id'] = auth()->id();

        $comment = $blog->comments()->create($cleanData);

        $blog->subscribedUsers->filter(function($user){
            return $user->id !== auth()->id();
        })->each(function ($user) use ($comment){
            Mail::to($user->email)->queue(new NotifyUser($comment,$user));
        });

        return back();
    }

    public function edit(Comment $comment){

        return view('comments.edit',compact('comment'));
       }


       public function update(Comment $comment){

       $cleanData= request()->validate([
        'body' =>['required']
       ]);

        $comment->update($cleanData); 
    return redirect('/blogs/'.$comment->blog->slug)->with('success','Comment updated successfully');
   }

   public function destory (Blog $blog){

    $blog->delete();
    return redirect()->back()->with('success','Blog deleted successfully');
   }

}
