<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected  $table   = 'comments';
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
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

}
