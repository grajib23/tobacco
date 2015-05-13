<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 2:25 AM
 */

namespace App\Decorators\Validators;


use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Contracts\Validation\ValidationException;

class UserValidator extends BaseValidator implements UserRepository{

    protected $rules = [
        'common' => [
            'email'           => 'required|max:100|unique:users',
            'group_id'        => 'required|integer|exists:groups,id',
        ],
        'create' => [
            'password'   => 'required|max:255',
        ],
        'update' => [
            'id'  => 'required|exists:users,id',
        ]
    ];

    function __construct(Validation $validation, UserRepository $model)
    {
        parent::__construct($validation,$model);
    }

    public function update($id, array $attribute)
    {
        $attribute['id'] = $id;
        $this->rules['common']['email'] =  'required|unique:users,email,'.$id;
        $rules = array_merge($this->rules['common'],$this->rules['update']);
        $validator = $this->validation->make($attribute, $rules);
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        return $this->model->update($id,$attribute);
    }
}