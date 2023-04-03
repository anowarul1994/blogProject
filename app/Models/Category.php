<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static latest()
 * @method static orderBy(string $string, string $string1)
 */
class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function find(Category $category)
    {
    }
}
