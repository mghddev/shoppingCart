<?php
namespace App\DAL\Model;

use App\Constant\TableName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Rule
 * @package App\DAL\Model
 */
class Rule extends Model
{
    public $table = TableName::RULES;

    protected $fillable = ['goods_id', 'quantity', 'special_price', 'is_active'];
    /**
     * @return BelongsTo
     */
    public function goods(): BelongsTo
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }
}
