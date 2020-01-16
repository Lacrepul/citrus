<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Detail;
use Illuminate\Http\Request;
use App\Repositories\DetailRepository;

class DetailCheckListController extends Controller{
    protected $detail;
    
    public function __construct(DetailRepository $detail)
    {
      $this->detail = $detail;
    }
    
    function index(Request $request){
        $str = Checklist::find($request->id);
        return view('checkLists.detail', [
            'details' => $this->detail->forCheckList($str),
            ])->with('i', 1);
    }

    public function check(Request $request){
      $id = $request['id'];
      $updateMainCheck = Detail::find($id);
      $updateMainCheck->Main_check = $request->value;
      $updateMainCheck->save();
  }
}
