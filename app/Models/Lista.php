<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed'];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public function getCompletedTasksAttribute()
    {
        return $this->tarefas()->where('completed', true)->count();
    }

    public function getTotalTasksAttribute()
    {
        return $this->tarefas()->count();
    }
}
