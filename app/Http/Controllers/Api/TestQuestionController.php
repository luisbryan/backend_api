<?php

namespace Testu\Http\Controllers\Api;

use Illuminate\Http\Request;
use Testu\Http\Requests\TestQuestionStore;
use Testu\Http\Controllers\Controller;
use Testu\Repositories\Criteria\Question\QuestionsByTest;
use Testu\Repositories\Exceptions\RepositoryException;
use Testu\Repositories\TestQuestionRepository as Question;
use Testu\Repositories\TestRepository as Test;

class TestQuestionController extends Controller
{
    protected $question;
    protected $test;

    /**
     * TestQuestionController constructor.
     * @param $testQuestion
     */
    public function __construct(Question $question, Test $test)
    {
        $this->question = $question;
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $test
     * @return Response
     */
    public function index($test)
    {
	    $questions = $this->test->pushCriteria(new QuestionsByTest($test));

	    return response()->json([
	        'status' => 'ok',
	        'test' => $questions->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $test
     * @param  TestQuestionStore  $request
     * @return Response
     */
    public function store($test, TestQuestionStore $request)
    {
        try {
            $request['test_id'] = $test;
            $question = $this->question->create($request->all());

            return response()->json([
                'status'   => 'ok',
                'question' => $question
            ]);
        } catch (RepositoryException $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 500);
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param $test
	 * @param $question
	 * @return Response
	 * @internal param int $id
	 */
    public function show($test, $question)
    {
        $question = $this->question->find($question);
		return response()->json([
			'status' => 'ok',
			'question' => $question
		]);
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param         $test
	 * @param         $question
	 * @param Request $request
	 * @return Response
	 * @internal param int $id
	 */
    public function update($test, $question,Request $request)
    {
        try {
	        $this->question->update($question, $request->all());
	        return response()->json([
		        'status' => 'ok'
	        ]);
        } catch (RepositoryException $ex) {
	        return response()->json([
		        'error' => $ex->getMessage()
	        ], 500);
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $test
	 * @param $question
	 * @return Response
	 * @internal param int $id
	 */
    public function destroy($test, $question)
    {
        $this->question->delete($question);
	    return response()->json([
		    'status' => 'ok'
	    ]);
    }
}
