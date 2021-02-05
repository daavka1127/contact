<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $table = 'tb_heltes';
  public $primaryKey = 'id';
  public $timestamps = false;
}
