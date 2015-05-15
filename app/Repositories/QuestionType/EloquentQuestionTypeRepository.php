<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:04 PM
 */

namespace App\Repositories\QuestionType;


use App\Models\QuestionType;
use App\Repositories\BaseRepository;

class EloquentQuestionTypeRepository extends BaseRepository implements QuestionTypeRepository{

    function __construct(QuestionType $model)
    {
        parent::__construct($model);
    }


}