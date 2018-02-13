<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ItemClass",
 *      required={"item"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="item",
 *          description="item",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class ItemClass extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'item_classes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'item',
        'description',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item' => 'string',
        'description' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'item' => 'required'
    ];

    public function sluggable()
    {
        return [
            'slug'=>[
                'source'=>'item'
            ]
        ];
    }


    public function categories(){
        return $this->hasMany('App\Models\Admin\Category','item_class_id','id');
    }
    
}
