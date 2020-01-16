<?php

namespace App\Repositories;

use App\Checklist;

class DetailRepository
{
  /**
   * Получить все задачи заданного пользователя.
   */
  public function forCheckList(Checklist $checklist){
    return $checklist->detailsChecklistRelation()
              ->orderBy('created_at', 'asc')
              ->get();
  }
}