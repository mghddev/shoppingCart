<?php

namespace App\DAL\Model;

use App\Constant\TableName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Goods
 *
 * @package App\DAL\Model
 */
class Goods extends Model
{
    public $table = TableName::GOODS;

    protected $fillable = ['title', 'unit_price'];

    /**
     * @return HasMany
     */
    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class, 'goods_id', 'id');
    }
}
