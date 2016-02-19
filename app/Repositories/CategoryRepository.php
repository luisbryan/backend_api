<?php
	namespace Testu\Repositories;

	use Testu\Repositories\Eloquent\Repository;

	class CategoryRepository extends Repository
	{
		function model()
		{
			return 'Testu\Entities\Category';
		}

	}