<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueryBuilderBootExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->model_boot_saving = 'wrote it!!';
        });
    }
}
