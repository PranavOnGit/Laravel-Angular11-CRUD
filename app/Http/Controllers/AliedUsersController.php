<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\ Facades\Route;
use App\alied_users;


class AliedUsersController extends Controller
{
    public function index(){   
        $userdata =  alied_users::orderBy('id', 'desc')->get();
        return response()->json($userdata);
        // return view('AliedUsers',compact('userdata'));
    }

    public function getUserById($id){
        $userdata =  alied_users::where('id', $id)->first();
        return response()->json($userdata);
    }

    public function newUser(Request $request){
        $newUser = new alied_users();
        $newUser->userName = $request->userName;
        $newUser->department = $request->department;
        $newUser->role = $request->role;
        $newUser->city = $request->city;
        
        if($newUser->save()){
            return response()->json("Data Added Successfully");
        }else{
            return response()->json("Something went wrong!");
        }
    }
    public function updateUser(Request $request){
        
        try{
            $newUser =  alied_users::find($request->id);
            $newUser->userName = $request->userName;
            $newUser->department = $request->department;
            $newUser->role = $request->role;
            $newUser->city = $request->city;
            if($newUser->save()){
                return response()->json("Data Added Successfully");
            }else{
                return response()->json("Something went wrong!");
            }
        }catch(Exception $e){
            return response()->json("Something went wrong with record!");
        }

    }

    public function destroy($id){
        $lead = alied_users::find($id);
        if($lead->delete()){
            return  response([
                'status'=>true,
                'data'=>"User with ID:".$lead->id." deleted successfully."
            ],Response::HTTP_OK);   
        }else{
            return  response([
                'status'=>false,
                'data'=>"Unable to delete User with ID:".$lead->id."."
            ],Response::HTTP_OK);
        }
    }    
}
