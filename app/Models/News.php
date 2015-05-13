<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model {

    use SoftDeletes;
	protected  $table = 'news';
    protected $guarded  = ['id','created_at','updated_at','deleted_at'];
    protected $hidden   = ['created_at','updated_at','deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function author(){
        return $this->belongsTo('App\Models\User','author_id','id');
    }

}
