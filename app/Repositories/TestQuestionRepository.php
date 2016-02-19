<?php
	namespace Testu\Repositories;


	use Testu\Repositories\Eloquent\Repository;

	class TestQuestionRepository extends Repository
	{
		function model()
		{
			return 'Testu\Entities\TestQuestion';
		}


	}