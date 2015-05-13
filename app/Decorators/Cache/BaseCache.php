<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 11:48 PM
 */

namespace App\Decorators\Cache;


use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Cache\Repository as Cache;

abstract class BaseCache {

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var RestaurantRepository
     */
    protected $model;

    protected $baseCacheKey = '';

    /**
     * @param Cache $cache
     * @param RestaurantRepository $model
     */
    function __construct(Cache $cache, RepositoryInterface $model)
    {
        $this->cache = $cache;
        $this->model = $model;
    }

    /**
     * Find all the entries
     * @return array
     */
    public function all()
    {
        return $this->cache->sear($this->getKey('all'), function() {
            return $this->model->all();
        });
    }

    /**
     * Find an entry with it's ID
     * @param $id int ID of the Entry
     * @return mixed
     */
    public function byId($id)
    {
        return $this->cache->sear($this->getKey('id-' . $id), function() use ($id) {
            return $this->model->byId($id);
        });
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if($this->model->create($attributes)) {
            $this->cache->forget($this->getKey('all'));
        }
    }

    public function update($id, array $attribute)
    {
        if($this->model->update($id,$attribute)){
            $this->cache->forget($this->getKey('all'));
            $this->cache->forget($this->getKey('id-' . $id));
        }
    }

    private function getKey($subKeys)
    {
        return sha1($this->baseCacheKey . $subKeys);
    }
}