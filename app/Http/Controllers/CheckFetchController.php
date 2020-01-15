<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist;

class CheckFetchController extends Controller{

    public function check(Request $request){
        $id = $request['id'];
        $updateMainCheck = Checklist::find($id);
        $updateMainCheck->Main_check = $request->value;
        $updateMainCheck->save();
    }

    public function main(Request $request){
        return view('welcome', [
        'UserCheckLists' => $this->checkLists->forUser($request->user()),
        ])->with('i', 1);
    }
}