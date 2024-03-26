<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable =  ['label', 'color'];

    // Funzione per mettere in relazione la tabella projects con la tabella types
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
