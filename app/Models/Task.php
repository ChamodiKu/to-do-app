<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @class Task
     * @table task
     *
     * integer $id
     * string $title
     * text $description
     * boolean $status     0=>Pending, 1=>Done
     *
     **/

    protected $table = 'task';
    protected $fillable = [
      'title',
      'description',
      'status'
    ];
}
