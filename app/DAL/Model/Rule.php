<?php

namespace App\DAL\Model;

use App\Constant\TableName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rule extends Model
{
    public $table = TableName::RULES;
    protected $fillable = ['goods_id', 'quantity', 'special_price', 'is_active'];

    public function goods(): BelongsTo
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }
}
