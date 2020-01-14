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
  * Отображение представления создания
  */
  public function index()
  {
    return view('checkLists.index');
  }

  /**
   * Создание новой задачи.
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:15',
    ]);

    $this->validate($request, [
      'description' => 'required|max:255',
    ]);

    $request->user()->checkListsUserRelation()->create([
      'name' => $request->name,
      'description' => $request->description,
      'Main_check' => 0,
    ]);

    return redirect('/');
  }
}
