<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Поля, доступні для масового заповнення.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * Зв'язок "один-до-багатьох" з моделлю Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
