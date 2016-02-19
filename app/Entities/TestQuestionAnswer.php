<?php

namespace Testu\Entities;

use Illuminate\Database\Eloquent\Model;

class TestQuestionAnswer extends Model
{
    protected $fillable = ['answer', 'correct_answer', 'test_question_id'];

	public function question()
	{
		return $this->belongsTo('Testu\Entities\TestQuestion', 'test_question_id');
	}
}
