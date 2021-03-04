<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        // 多くのCommentsは1つのUserに関連している
        return $this->belongsTo('App\User');
    }

    public function todo()
    {
        // 多くのCommentsは1つのTodoに関連している
        return $this->belongsTo('App\Todo');
    }
}
