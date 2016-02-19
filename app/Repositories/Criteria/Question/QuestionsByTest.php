<?php
	namespace Testu\Repositories\Criteria\Question;

	use Testu\Repositories\Contracts\RepositoryInterface as Repository;
	use Testu\Repositories\Criteria\Criteria;

	class QuestionsByTest extends Criteria
	{
		protected $test;

		/**
		 * QuestionsByTest constructor.
		 * @param $test
		 */
		public function __construct($test)
		{
			$this->test = $test;
		}

		/**
		 * @param            $model
		 * @param Repository $repository
		 * @return mixed
		 */
		public function apply($model, Repository $repository)
		{
			//get questions with tests
			$model = $model->where('id', $this->test)->with('questions');
			return $model;
		}

	}