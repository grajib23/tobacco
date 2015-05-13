<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 12:36 AM
 */

namespace App\Repositories\News;


use App\Models\News;
use App\Repositories\BaseRepository;

class EloquentNewsRepository extends BaseRepository implements NewsRepository {

    function __construct(News $model)
    {
        parent::__construct($model);
    }


}