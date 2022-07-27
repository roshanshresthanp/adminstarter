<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success','Comment has been deleted successfully');
    }
    public function commentStatus($id){

        $cmt = Comment::findOrFail($id);
        if($cmt->status ==0){
            $cmt->status =1;
            $cmt->save();
        }else{
            $cmt->status=0;
            $cmt->save();
        }
        return redirect()->back()->with('success','Comment status has been changed');
    }
}
