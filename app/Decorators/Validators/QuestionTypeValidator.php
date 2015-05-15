<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:07 PM
 */

namespace App\Decorators\Validators;


use App\Repositories\QuestionType\QuestionTypeRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class QuestionTypeValidator extends BaseValidator implements QuestionTypeRepository{

    protected $rules = [
        'common' => [
            'type'         => 'required|max:255',
            'status'        => 'required|integer',
        ],
        'create' => [],
        'update' => [
            'id'      => 'required|exists:question_type,id',
        ]
    ];

    function __construct(Validation $validation, QuestionTypeRepository $model)
    {
        parent::__construct($validation,$model);
    }
}