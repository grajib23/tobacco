<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 8:13 PM
 */

namespace App\Decorators\Validators;


use App\Repositories\QuestionAnswer\QuestionAnswerRepository;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Contracts\Validation\ValidationException;

class QuestionAnswerValidator implements QuestionAnswerRepository{

    /**
     * @var Validation
     */
    protected $validation;
    /**
     * @var RepositoryInterface
     */
    protected $model;

    protected $rules = [
        'common' => [
            'answer'              => 'required',
            'status'              => 'required|integer',
            'question_id'         => 'required|exists:questions,id',
            'author_id'           => 'required|exists:users,id',
        ],
        'create' => [],
        'update' => [
            'id'  => 'required|exists:question_answer,id',
        ]
    ];

    /**
     * @param Validation $validation
     * @param RepositoryInterface $model
     */
    function __construct(Validation $validation, QuestionAnswerRepository $model)
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
    public function all($questionId)
    {
        return $this->model->all($questionId);
    }

    /**
     * Find an entry with it's ID
     * @param $id int ID of the Entry
     * @return mixed
     */
    public function byId($questionId,$id)
    {
        return $this->model->byId($questionId,$id);
    }

}