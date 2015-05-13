<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:54 AM
 */

namespace App\Decorators\Validators;

use App\Repositories\Post\PostRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class PostValidator extends BaseValidator implements PostRepository{

    protected $rules = [
        'common' => [
            'title'         => 'required|max:100',
            'status'        => 'required|integer',
            'author_id'     => 'required|integer|exists:users,id',
        ],
        'create' => [],
        'update' => [
            'id'      => 'required|exists:posts,id',
        ]
    ];

    function __construct(Validation $validation, PostRepository $model)
    {
        parent::__construct($validation,$model);
    }

}