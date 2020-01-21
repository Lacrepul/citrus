<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CheckListsRepository;

class CheckListController extends Controller
{
  /**
   * Создание нового экземпляра контроллера.
   */
  public function __construct(CheckListsRepository $checkLists)
  {
    $this->middleware('auth');

    $this->checkLists = $checkLists;
  }

  /**
  * Отображение представления создания check-list
  */
  public function indexCreate()
  {
    return view('checkLists.createCheckList');
  }

  /**
   * Создание новой задачи.
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:50',
    ]);

    $this->validate($request, [
      'description' => 'required|max:400',
    ]);

    $request->user()->checkListsUserRelation()->create([
      'name' => $request->name,
      'description' => $request->description,
    ]);

    return redirect('/');
  }
}
