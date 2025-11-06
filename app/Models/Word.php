<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_phrase',
        'language',
        'translation',
        'definition',
        'category',
        'web_img',
        'example_usage',
        'note',
        'next_revision',
        'user_id',
    ];
}
