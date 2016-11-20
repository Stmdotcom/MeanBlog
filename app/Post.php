<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    use HybridRelations;
    protected $connection = 'mongodb';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
