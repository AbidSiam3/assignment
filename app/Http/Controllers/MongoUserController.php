<?php

namespace App\Http\Controllers;

use App\Http\Models\MongoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MongoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = MongoUser::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return 0;
        }


        return MongoUser::insert($request->all())? 1 : 0;

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\MongoUser  $mongoUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return MongoUser::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\MongoUser  $mongoUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MongoUser $mongoUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\MongoUser  $mongoUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//     dd($request , $id);
        $inputs = $request->all();
        $user = MongoUser::findOrFail($request->id);


        return $user->update($inputs) ? 1 : 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\MongoUser  $mongoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return MongoUser::destroy($id) ? 1 : 0;
    }
}
