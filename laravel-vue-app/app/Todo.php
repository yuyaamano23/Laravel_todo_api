<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function todo()
    {
        // 1つのTodoは多くのcommentを持っている
        return $this->hasMany('App\Comment');
    }
}
