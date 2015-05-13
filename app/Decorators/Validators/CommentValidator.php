<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 1:00 AM
 */

namespace App\Decorators\Validators;


use App\Repositories\Comment\CommentRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class CommentValidator extends BaseValidator implements CommentRepository{

    protected $rules = [
        'common' => [
            'desc'          => 'required',
            'post_id'       => 'required|integer|exists:posts,id',
            'user_id'       => 'required|integer|exists:users,id',
            'status'        => 'required|integer',
        ],
        'create' => [],
        'update' => [
            'id'      => 'required|exists:posts,id',
        ]
    ];

    function __construct(Validation $validation, CommentRepository $model)
    {
        parent::__construct($validation,$model);
    }
}