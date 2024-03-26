<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'technologies', 'type_id', 'url', 'start_date', 'end_date', 'status'];

    // Funzioni per cambiare formato della data
    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    // Funzione per mettere in relazione la tabella projects con la tabella types
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
