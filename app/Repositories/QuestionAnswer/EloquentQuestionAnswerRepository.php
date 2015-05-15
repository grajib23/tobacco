<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:59 PM
 */

namespace App\Repositories\QuestionAnswer;


use App\Models\Question;
use App\Models\QuestionAnswer;

class EloquentQuestionAnswerRepository implements QuestionAnswerRepository{

    private $parentModel;
    private $relationalModelName;
    private $model;

    function __construct(Question $question, QuestionAnswer $model)
    {
        $this->parentModel = $question;
        $this->relationalModelName = 'answers';
        $this->model = $model;
    }

    /**
     * Find all the entries
     * @return Model
     */
    public function all($questionId)
    {
        return $this->parentModel->with( $this->relationalModelName )->find( $questionId );
    }

    /**
     * Find an entry with it's ID
     * @param $id int ID of the Entry
     * @return mixed
     */
    public function byId($questionId, $id)
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