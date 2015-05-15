<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:32 PM
 */

namespace App\Decorators\Validators;


use App\Repositories\Question\QuestionRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class QuestionValidator extends  BaseValidator implements QuestionRepository{

    protected $rules = [
        'common' => [
            'desc'              => 'required',
            'type'              => 'required|max:50',
            'status'            => 'required|integer',
            'author_id'         => 'required|exists:users,id',
        ],
        'create' => [],
        'update' => [
            'id'      => 'required|exists:question_type,id',
        ]
    ];

    function __construct(Validation $validation, QuestionRepository $model)
    {
        parent::__construct($validation,$model);
    }
}