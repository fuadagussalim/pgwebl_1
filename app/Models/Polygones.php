<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygones extends Model
{
    use HasFactory;
    protected $table = 'table_polygones';

    // Yang tidak boleh diubah, yang lain boleh..
    protected $guarded =
    ['id'];
}
