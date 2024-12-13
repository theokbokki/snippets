<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Theokbokki\LaravelFilterSearch\HasFilterSearch;

class Snippet extends Model
{
    /** @use HasFactory<\Database\Factories\SnippetFactory> */
    use HasFactory;
    use SoftDeletes;
    use HasFilterSearch;

    protected $fillable = [
        'title',
        'code',
        'language',
    ];

    public static function defaultSearchFields(): array
    {
        return [
            'title',
            'code',
        ];
    }

    public static function allowedSearchFields(): array
    {
        return [
            'title',
            'code',
            'language',
        ];
    }
}
