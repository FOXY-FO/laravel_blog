<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const IS_DENIED = 0;
    const IS_ALLOWED = 1;

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function allow()
    {
        $this->status = Comment::IS_ALLOWED;
        $this->save();
    }

    public function deny()
    {
        $this->status = Comment::IS_DENIED;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status === Comment::IS_DENIED) { return $this->allow(); }
        return $this->deny();
    }

    public function remove()
    {
        $this->delete();
    }   
}
