<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $sub_category)
 * @method static latest()
 * @method static orderBy(string $string, string $string1)
 */
class SubCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
