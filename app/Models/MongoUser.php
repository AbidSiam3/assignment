<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MongoUser extends  Model
{
    protected $connection = 'mongodb';
    protected $collection = 'user';

    protected $fillable = [
        'id','name', 'email', 'gender', 'status'
    ];
}
