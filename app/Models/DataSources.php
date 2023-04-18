<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSources extends Model
{
    use HasFactory;

    protected $table = 'data_sources';

    protected $fillable = [
        'resource_name',
        'resource_url',
    ];
}
