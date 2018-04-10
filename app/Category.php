<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

  public function project() { //  $cate->project(); เรียกได้ความสัมพัน แต่ถ้าไม่มีวงเล็บได้ค่า propoty
    return $this->belongsTo('App\Project','project_id');
  }

  public function assignTo() {
    return $this->belongsTo('App\User','assign_to');
  }

  public function scopeGlobal($query) {
    return $query->where('project_id',null);
  }

  public function scopeAdminTask($query) {//$cate = \App\Category::global()->adminTask()->get();
    // $admin = \App\User::where('access_level','administrator')->first();
    $admin = \App\User::admin()->first();
    return $query->where('assign_to',$admin->id);
  }
}
