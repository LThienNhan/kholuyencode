<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'lesson_statuses';

    protected $fillable = [
       'id', 'lesson_type', 'name', 'order_index', 'color', 'color_alt_1', 'color_alt_2', 'default', 'created_at', 'updated_at', 'deleted_at', 'icon_url'
    ];
}
