<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Info;
use App\Http\Resources\Info as InfoResource;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::paginate(15);
        return InfoResource::collection($infos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = $request->isMethod('put') ? Info::findOrFail($request->info_id) : new Info;

        $info->id = $request->input('info_id');
        $info->name = $request->input('name');
        $info->email = $request->input('email');
        $info->phonenumber = $request->input('phonenumber');
        $info->message = $request->input('message');

        if($info->save()){
            return new InfoResource($info);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::findOrFail($id);
        return new InfoResource($info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);

        if($info->delete()){
            return new InfoResource($info);
        }
    }
}
