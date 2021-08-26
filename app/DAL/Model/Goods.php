<?php

namespace App\DAL\Model;

use App\Constant\TableName;
use Database\Factories\GoodsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goods extends Model
{
    use HasFactory;

    public $table = TableName::GOODS;
    protected $fillable = ['title', 'unit_price'];

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class, 'goods_id', 'id');
    }

    public static function newFactory(): GoodsFactory
    {
        return GoodsFactory::new();
    }
}
