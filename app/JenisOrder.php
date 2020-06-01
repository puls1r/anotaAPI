<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisOrder extends Model
{
     protected $primaryKey = 'jenisOrder';
     public $incrementing = false; //digunakan untuk primary key yang bukan increment supaya gak muncul 0
}
