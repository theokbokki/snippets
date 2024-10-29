<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    /** @use HasFactory<\Database\Factories\SnippetFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'language',
    ];
}
