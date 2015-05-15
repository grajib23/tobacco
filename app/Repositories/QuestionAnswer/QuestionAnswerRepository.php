<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/15/15
 * Time: 7:56 PM
 */

namespace App\Repositories\QuestionAnswer;


interface QuestionAnswerRepository {

    public function all($questionId);

    public function byId($questionId, $id);

    public function create(array $attributes);

    public function update($id, array $attributes);
}