<?php

namespace Testu\Http\Controllers\Api;

use Illuminate\Http\Request;
use Testu\Http\Requests;
use Testu\Http\Controllers\Controller;
use Testu\Repositories\Criteria\Answer\QuestionByAnswer;
use Testu\Repositories\Exceptions\RepositoryException;
use Testu\Repositories\QuestionAnswerRepository as Answer;
use Testu\Repositories\TestQuestionRepository as Question;

class QuestionAnswerController extends Controller
{
    protected $question;
    protected $answer;

    /**
     * QuestionAnswer constructor.
     * @param $question
     * @param $answer
     */
    public function __construct(Question $question, Answer $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question)
    {
        try {
            $questions = $this->answer->pushCriteria(new QuestionByAnswer($question));
            return response()->json([
                'status' => 'ok',
                'questions' => $questions->all()
            ]);
        } catch (RepositoryException $ex){
            return response()->json([
                'error' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($question, Request $request)
    {
        try {
			$request['question_id'] = $question;
	        $answer = $this->question->create($request->all());

	        return response()->json([
		        'status' => 'ok',
		        'answer' => $answer
	        ]);

        } catch(RepositoryException $ex) {
	        return response()->json([
		       'error' => $ex->getMessage()
	        ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
