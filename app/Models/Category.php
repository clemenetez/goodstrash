<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;

    /**
     * Поля, доступні для масового заповнення.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Зв’язок “один-до-багатьох” з моделлю Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
