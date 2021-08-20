<?php
namespace App\DAL\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Goods
 * @package App\DAL\Model
 */
class Goods extends Model
{
    public $table = "goods";
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = ['title', 'unitPrice'];

    /**
     * @return HasMany
     */
    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }
}
