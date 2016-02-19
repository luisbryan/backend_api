<?php
	namespace Testu\Repositories;

	use Testu\Repositories\Eloquent\Repository;

	class TestRepository extends Repository
	{

		public function model()
		{
			return 'Testu\Entities\Test';
		}
	}