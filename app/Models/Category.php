<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static latest()
 * @method static orderBy(string $string, string $string1)
 * @method static truncate()
 * @method static pluck(string $string, string $string1)
 * @method static find(int $id)
 */
class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category()
    {
        return $this->hasMany(SubCategory::class);
    }
}
