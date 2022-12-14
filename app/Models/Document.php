<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(mixed $get)
 */
class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'file_name',
        'extension',
        'type'
    ];
}
