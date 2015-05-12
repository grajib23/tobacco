<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:50 AM
 */

namespace App\Repositories\Post;


use App\Models\Post;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

class EloquentPostRepository extends BaseRepository implements PostRepository{


    /**
     * @param Post $post
     */
    function __construct(Post $post)
    {
        parent::__construct($post);
    }
}