<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['detailName', 'id',];

    public function checklist(){
      return $this->belongsTo(Checklist::class);
    }
}
