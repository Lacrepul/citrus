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
          'details' => $this->detail->forCheckList($str)
      ], ['str' => $str])->with('i', 1);
  }

  public function check(Request $request){
    $id = $request['id'];
    $updateMainCheck = Detail::find($id);
    $updateMainCheck->Main_check = $request->value;
    $updateMainCheck->save();
  }

  public function checkSecondary(Request $request){
    $id = $request['id'];
    $checkBoxid = 'secondary_check'.$request->secondaryId;
    $updateMainCheck = Detail::find($id);

    $updateMainCheck->$checkBoxid = $request->value;
    $updateMainCheck->save();

    return $checkBoxid;
  }
  
  //create
  function createForm(Request $request){
    return view('checkLists.detailCreate', [
      'detail' => $request]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:15',
    ]);

    $this->validate($request, [
      'description' => 'required|max:2000',
    ]);

    $id = $request['id']; // ID checkkist
    $updatedChecklist = Checklist::find($id);
    $updatedChecklist->detailsChecklistRelation()->create([
      'detailName' => $request->name,
      'Main_check' => 0,
      'secondary_check0' => 0,
      'secondary_check1' => 0,
      'secondary_check2' => 0,
      'secondary_check3' => 0,
      'secondary_check4' => 0,
      'description' => $request->description,
      'secondary_input0' => $request->checkboxDescriptionName1,
      'secondary_input1' => $request->checkboxDescriptionName2,
      'secondary_input2' => $request->checkboxDescriptionName3,
      'secondary_input3' => $request->checkboxDescriptionName4,
      'secondary_input4' => $request->checkboxDescriptionName5,
    ]);
    return redirect('/detail/'.$id);
  }

  function showSecondaryCheckboxes(){
    return response()->json(Detail::all());
  }
}
