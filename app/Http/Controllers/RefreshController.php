<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MongoUser;

class RefreshController extends Controller
{
    /**
     * refresh users from original api
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        MongoUser::truncate();
        return MongoUser::insert($request->all())? 1 : 0;
    }
}
