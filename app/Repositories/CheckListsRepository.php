<?php

namespace App\Repositories;

use App\User;

class CheckListsRepository
{
  /**
   * Получить все задачи заданного пользователя.
   */
  public function forUser(User $user)
  {
    return $user->checkListsUserRelation()
              ->orderBy('created_at', 'asc')
              ->get();
  }
}