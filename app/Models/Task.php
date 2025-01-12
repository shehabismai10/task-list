<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =['title','description','long_description'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function togglecomplete(){
        $this->completed =!$this->completed;  //If $task->completed is true, the expression !$task->completed becomes false, so the line sets $task->completed to false.
        $this->save();
    }
}
