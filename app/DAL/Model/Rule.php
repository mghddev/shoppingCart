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
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = ['goodsId', 'quantity', 'specialPrice', 'isActive'];
    /**
     * @return BelongsTo
     */
    public function goods(): BelongsTo
    {
        return $this->belongsTo(Goods::class, 'goodsId', 'id');
    }
}
