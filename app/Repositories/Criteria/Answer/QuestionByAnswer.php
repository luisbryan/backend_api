<?php
	namespace Testu\Repositories\Criteria\Answer;


	use Illuminate\Database\Eloquent\Model;
	use Testu\Repositories\Contracts\RepositoryInterface as Repository;
	use Testu\Repositories\Criteria\Criteria;

	class QuestionByAnswer extends Criteria
	{
		protected $question;

		/**
		 * QuestionByAnswer constructor.
		 * @param $question
		 */
		public function __construct($question)
		{
			$this->question = $question;
		}


		/**
		 * @param  Model  $model
		 * @param Repository $repository
		 * @return mixed
		 */
		public function apply($model, Repository $repository)
		{
			return $model->where('id', $this->question)->with('answers');
		}


	}