<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\InterestResource;
use App\Http\Resources\GroupResource;
use App\Interest;
use App\User;
use App\Group;
use Illuminate\Http\Response;

class InterestController extends Controller
{
    //this function to show all interests
    public function index(){
        $interests= Interest::all();
        $interestResource = InterestResource::collection($interests);
        return $interestResource;
    }
    //this function to display single interest
    public function  show(){
        $interestId = request()->interest;
        $interest = Interest::find($interestId);
        if($interest){
        return new InterestResource($interest);
        }else{
            $response = new Response(['response'=>'This interest does not exist !!..']);
            return $response->setStatusCode(404);
        }
    }
    //this function to display groups of single interest
    public function  groups(){
        $interestId = request()->interest;
        $interest = Interest::find($interestId);
        if($interest){
        $groups =  $interest->groups;
        $groupResource = GroupResource::collection($groups);
        return $groupResource;
        }
        else{
            $response = new Response(['response'=>'This interest does not exist !!..']);
            return $response->setStatusCode(404);
        }
    }
    //-------------------- here u can get all interests
    public function interests(Request $request){
      return Interest::all();
    }

}
