<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getCategorySubCategoryNameAttribute()
    {
        $categoryName = $this->category ? $this->category->name : 'No Category';
        $subCategoryName = $this->name;

        return "{$categoryName} - {$subCategoryName}";
    }
}
