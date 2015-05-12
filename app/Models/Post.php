<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use SoftDeletes;
    protected  $table = 'posts';
    protected $guarded  = ['id','created_at','updated_at','deleted_at'];
    protected $hidden   = ['created_at','updated_at','deleted_at'];

}
