<?php
	namespace Testu\Repositories\Criteria\Category;

	use Testu\Repositories\Criteria\Criteria;
	use Testu\Repositories\Contracts\RepositoryInterface as Repository;

	class WithSubCategory extends Criteria
	{

		/**
		 * @param            $model
		 * @param Repository $repository
		 * @return mixed
		 */
		public function apply($model, Repository $repository)
		{
			$query = $model->where('length', '>', 120);
			return $query;
		}
	}