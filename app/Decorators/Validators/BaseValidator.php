<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:42 AM
 */

namespace App\Decorators\Validators;

use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Contracts\Validation\ValidationException;

abstract class BaseValidator {

    /**
     * @var Validation
     */
    protected $validation;
    /**
     * @var RepositoryInterface
     */
    protected $model;

    protected $rules = [
        'common' => [],
        'create' => [],
        'update' => []
    ];

    /**
     * @param Validation $validation
     * @param RepositoryInterface $model
     */
    function __construct(Validation $validation, RepositoryInterface $model)
    {
        $this->validation = $validation;
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $attributes)
    {
        $rules = array_merge($this->rules['common'], $this->rules['create']);
        $validator = $this->validation->make($attributes, $rules);

        if($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->model->create($attributes);
    }

   public function update($id, array $attribute)
    {
        $attribute['id'] = $id;
        //$this->setUpdateRules($id);
        $rules = array_merge($this->rules['common'],$this->rules['update']);
        $validator = $this->validation->make($attribute, $rules);
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        return $this->model->update($id,$attribute);
    }

    /**
     * Find all the entries
     * @return array
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
        return $this->model->byId($id);
    }
}