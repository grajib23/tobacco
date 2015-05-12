<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/13/15
 * Time: 2:39 AM
 */

namespace App\Repositories;


interface RepositoryInterface {

    public function all();

    public function byId($id);

    public function create(array $attributes);

    public function update($id, array $attributes);
}