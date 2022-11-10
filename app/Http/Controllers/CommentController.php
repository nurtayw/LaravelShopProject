<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function store(Request $request){
     $validated = $request->validate([
          'content' => 'required',
          'shop_id' => 'required|numeric'
       ]);
     Auth::user()->comments()->create($validated);
     return back()->with('message', 'Comment is added');
   }

   public function destroy(Comment $comment){
       $this->authorize('delete', $comment);
        $comment->delete();
        return back()->withErrors('Deleted');
   }

}
