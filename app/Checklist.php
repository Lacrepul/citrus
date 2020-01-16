<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['name', 'description', 'id', 'Main_check'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function detailsChecklistRelation(){
      return $this->hasMany(Detail::class);
    }
}
