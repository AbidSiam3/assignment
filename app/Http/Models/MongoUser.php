<?php

namespace App\Http\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MongoUser extends  Model
{
    protected $connection = 'mongodb';
    protected $collection = 'user';

    protected $fillable = [
        'name', 'email', 'gender', 'status'
    ];
}
