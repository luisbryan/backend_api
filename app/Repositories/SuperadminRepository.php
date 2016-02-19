<?php
	namespace Testu\Repositories;

	use Testu\Repositories\Eloquent\Repository;

	class SuperadminRepository extends Repository
	{

		public function model()
		{
			return 'Testu\User';
		}
	}