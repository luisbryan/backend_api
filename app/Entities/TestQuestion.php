<?php
namespace Testu\Entities;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
	protected $fillable = ['question', 'category', 'multiple_answer', 'test_id'];

	public function test ()
	{
		return $this->belongsTo('Testu\Entities\Test', 'test_id', 'id');
    }

	public function answers ()
	{
		return $this->hasMany('Testu\Entities\TestQuestionAnswer', 'test_question_id', 'id');
	}
}
