<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 12:29 AM
 */

namespace App\Decorators\Validators;


use App\Repositories\News\NewsRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class NewsValidator extends  BaseValidator implements NewsRepository {

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

    function __construct(Validation $validation, NewsRepository $model)
    {
        parent::__construct($validation,$model);
    }
}