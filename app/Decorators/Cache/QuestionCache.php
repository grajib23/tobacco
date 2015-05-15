<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:36 PM
 */

namespace App\Decorators\Cache;


use App\Repositories\BaseRepository;
use App\Repositories\Question\QuestionRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class QuestionCache extends BaseCache implements QuestionRepository{

    protected $baseCacheKey = 'question';

    function __construct(Cache $cache, QuestionRepository $model)
    {
        parent::__construct($cache,$model);
    }
}