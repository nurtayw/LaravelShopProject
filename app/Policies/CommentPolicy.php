<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Comment $comment)
    {
        //
    }

    public function update(User $user, Comment $comment)
    {
        //
    }

    public function delete(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) || ($user->role->name != 'user');
    }


    public function restore(User $user, Comment $comment)
    {
        //
    }


    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
