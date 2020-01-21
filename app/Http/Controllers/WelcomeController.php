<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CheckListsRepository;

class WelcomeController extends Controller{
  protected $checkLists;

  /**
   * Создание нового экземпляра контроллера.
   */
  public function __construct(CheckListsRepository $checkLists)
  {
    $this->middleware('auth');

    $this->checkLists = $checkLists;
  }

  /**
  * Отображение списка всех задач пользователя.
  */
  public function index(Request $request){
    return view('checkLists.checkList', [
    'UserCheckLists' => $this->checkLists->forUser($request->user()),
    ]);
  }
}
