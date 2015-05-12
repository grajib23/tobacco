<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:54 AM
 */

namespace App\Decorators\Validators;


use App\Repositories\BaseRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Contracts\Validation\Factory as Validation;

class PostValidator extends BaseRepository implements PostRepository{


    function __construct(Validation $validation, PostRepository $model)
    {
        parent::__construct($validation,$model);
    }

}