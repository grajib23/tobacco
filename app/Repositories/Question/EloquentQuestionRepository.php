<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:31 PM
 */

namespace App\Repositories\Question;


use App\Models\Question;
use App\Repositories\BaseRepository;

class EloquentQuestionRepository extends BaseRepository implements QuestionRepository{

    function __construct(Question $model)
    {
        parent::__construct($model);
    }


}