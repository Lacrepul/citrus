<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckListController extends Controller
{
  /**
   * Создание нового экземпляра контроллера.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Отображение списка всех задач пользователя.
  *
  * @param  Request  $request
  * @return Response
  */
 public function index(Request $request)
 {
   return view('checkLists.index');
 }

  /**
   * Создание новой задачи.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $request->user()->checklists()->create([
      'name' => $request->name,
    ]);

    return redirect('/checkLists');
  }
}
