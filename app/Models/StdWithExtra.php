<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdWithExtra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_std',
        'id_extras',
    ];

    protected $with = ['student', 'extracurricular'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'id_std');
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class, 'id_extras');
    }
}
