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
}