<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 8:20 PM
 */

namespace App\Decorators\Cache;


use App\Repositories\QuestionAnswer\QuestionAnswerRepository;
use Illuminate\Contracts\Cache\Repository as Cache;

class QuestionAnswerCache implements QuestionAnswerRepository{


    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var RestaurantRepository
     */
    protected $model;

    protected $baseCacheKey = 'question-answer';

    /**
     * @var string
     */
    protected $classKey = 'answer';

    /**
     * @var string
     */
    protected $key = 'key';

    /**
     * @param Cache $cache
     * @param RestaurantRepository $model
     */
    function __construct(Cache $cache, QuestionAnswerRepository $model)
    {
        $this->cache = $cache;
        $this->model = $model;
    }

    /**
     * Find all the entries
     * @return array
     */
    public function all($questionId)
    {
        return $this->cache->tags($this->baseCacheKey)->sear($this->getKey($this->key.'-'.$questionId.'-'.$this->classKey), function() use ($questionId){
            return $this->model->all($questionId);
        });
    }

    /**
     * Find an entry with it's ID
     * @param $id int ID of the Entry
     * @return mixed
     */
    public function byId($questionId,$id)
    {
        $this->key = $this->key.'-'.$questionId.'-'.$this->classKey.'-'.$id;
        return $this->cache->tags($this->baseCacheKey)->sear($this->getKey($this->key), function() use ($questionId, $id ) {
            return $this->model->byId($questionId,$id);
        });
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if($this->model->create($attributes)) {
            $this->cache->tags($this->baseCacheKey)->flush();
        }
    }

    public function update($id, array $attribute)
    {
        if($this->model->update($id,$attribute)){
            $this->cache->tags($this->baseCacheKey)->flush();
        }
    }

    private function getKey($subKeys)
    {
        return sha1($this->baseCacheKey . $subKeys);
    }
}