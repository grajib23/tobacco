<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionType extends Model {

    use SoftDeletes;
    protected  $table   = 'question_type';
    protected $guarded  = ['id','created_at','updated_at','deleted_at'];
    protected $hidden   = ['created_at','updated_at','deleted_at'];


}
