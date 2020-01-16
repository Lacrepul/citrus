<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;
use App\Repositories\DetailRepository;

class DetailCheckListController extends Controller{
    protected $detail;
    
    public function __construct(DetailRepository $detail)
    {
      //$this->middleware('auth');
  
      $this->detail = $detail;
    }
    
    function index(Request $request){
        $str = Checklist::find($request->id);
        return view('checkLists.detail', [
            'details' => $this->detail->forCheckList($str),
            ]);
    }
}
