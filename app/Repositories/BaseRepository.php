<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:38 AM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface{

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Find all the entries
     * @return Model
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find an entry with it's ID
     * @param $id int ID of the Entry
     * @return mixed
     */
    public function byId($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param array $attribute
     */
    public function update($id, array $attribute)
    {
        $object = $this->model->find($id);
        if($object){
            $object->fill($attribute);
            return $object->save();
        }
        return false;
    }
}