<?php
	namespace Testu\Repositories;

	use Testu\Repositories\Eloquent\Repository;

	class QuestionAnswerRepository extends Repository
	{

		public function model()
		{
			return 'Testu\Entities\TestQuestionAnswer';
		}
	}