<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\info;

class Restfulcontroller extends Controller
{
    public function getinfo(Request $request)
    {
        if(isset($request->id)){
            $getinfo = info::find($request->id);
            return response()->json(['getinfo' => $getinfo],201);
        }else{
            $getinfo = info::all();
            return response()->json(['getinfo' => $getinfo],201);
        }

    }
    public function postinfo(Request $request)
    {
        $newinfo  = new info();
        $newinfo->title = $request->input('title');
        $newinfo->info = $request->input('info');
        $newinfo->save();
        return response()->json(['newinfo' => $newinfo],201);
    }
    public function putinfo(Request $request,$id)
    {
        $update = info::find($id);
        if(!$update){
            return response()->json(['message' => 'Document not found'],404);   
        }
        $update->title = $request->input('title');
        $update->info = $request->input('info');
        $update->save();
        return response()->json(['updateinfo' => $update],200);
        
    }
    public function deleteinfo($id)
    {
       $delete = info::find($id);
       $delete->delete();
       return response()->json(['message' => 'info deleted'],200);
       
    }
}
