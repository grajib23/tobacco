<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:10 PM
 */

namespace App\Decorators\Cache;


use App\Repositories\QuestionType\QuestionTypeRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class QuestionTypeCache extends BaseCache implements QuestionTypeRepository{

    protected $baseCacheKey = 'question-type';

    function __construct(Cache $cache, QuestionTypeRepository $model)
    {
        parent::__construct($cache,$model);
    }
}