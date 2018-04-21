<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebboardReply extends Model
{
    protected $fillable = ['comment', 'created_by', 'reply_by'];

}
