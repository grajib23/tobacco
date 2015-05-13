<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 12:59 AM
 */

namespace App\Repositories\Comment;


use App\Models\Comment;
use App\Repositories\BaseRepository;

class EloquentCommentRepository extends BaseRepository implements CommentRepository{


    function __construct(Comment $model)
    {
        parent::__construct($model);
    }


}