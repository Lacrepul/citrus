<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['detailName', 'description', 'id', 'Main_check', 'secondary_check0', 'secondary_check1', 'secondary_check2',
     'secondary_check3', 'secondary_check4', 'secondary_input0', 'secondary_input1', 'secondary_input2', 'secondary_input3', 'secondary_input4'];

    public function checklist(){
      return $this->belongsTo(Checklist::class);
    }
}
