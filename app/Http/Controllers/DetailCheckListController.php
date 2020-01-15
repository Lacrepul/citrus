<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailCheckListController extends Controller
{
    function index(){
        return view('checkLists.detail');
    }
}
