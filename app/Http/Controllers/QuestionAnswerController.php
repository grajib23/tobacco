<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\QuestionAnswer\QuestionAnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QuestionAnswerController extends Controller {

    protected $model;

    function __construct(QuestionAnswerRepository $model)
    {
        $this->model  =$model;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($questionId)
	{
        return $this->model->all($questionId);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->model->create(Input::json()->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($questionId,$id)
	{
		return $this->model->byId($questionId,$id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($questionId,$id)
	{
		return $this->model->update($id,Input::json()->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($questionId,$id)
	{
		//
	}

}
