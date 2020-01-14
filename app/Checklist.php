<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['name', 'description', 'id'];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
