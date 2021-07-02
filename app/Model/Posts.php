<?php

declare (strict_types=1);
namespace App\Model;

use Carbon\Carbon;
use Hyperf\Database\Model\Relations\BelongsTo;

/**
 * @property int $id 
 * @property int $class_id 
 * @property string $title 
 * @property string $content 
 * @property string $author 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Posts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['class_id','title','content','author','created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'class_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * @return BelongsTo
     */
    public function classData(): BelongsTo
    {
        return $this->belongsTo(PostsClass::class, 'class_id', 'id');
    }
}