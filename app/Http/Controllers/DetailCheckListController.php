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

    /**
     * Представление детального листа
     */
  function index(Request $request){
      $str = Checklist::find($request->id);
      return view('details.detail', [
          'details' => $this->detail->forCheckList($str)
      ], ['str' => $str])->with('i', 1);
  }

    /**
     * Занести в базу отмеченные главные чекбоксы
     */
  public function checkMain(Request $request){
    $id = $request['id'];
    $updateMainCheck = Detail::find($id);
    $updateMainCheck->Main_check = $request->value;
    $updateMainCheck->save();
  }

    /**
     * Занести в базу отмеченные дополнительные чекбоксы
     */
  public function checkSecondary(Request $request){
    $id = $request['id'];
    $checkBoxid = 'secondary_check'.$request->secondaryId;
    $updateMainCheck = Detail::find($id);

    $updateMainCheck->$checkBoxid = $request->value;
    $updateMainCheck->save();

    return $checkBoxid;
  }
  
    /**
     * Представление создания детального листа
     */
  function createForm(Request $request){
    return view('details.detailCreate', [
      'detail' => $request]);
  }

    /**
     * Сохранить в базу детальный лист
     */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:15',
    ]);

    $this->validate($request, [
      'description' => 'required|max:1000',
    ]);

    $id = $request['id'];
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
  
  /**
   * Показать отмеченные чекбоксы
   */
  function showSecondaryCheckboxes(){
    return response()->json(Detail::all());
  }
}
