<?php
	namespace Testu\Repositories\Criteria;

	use Testu\Repositories\Contracts\RepositoryInterface as Repository;

	abstract class Criteria
	{
		/**
		 * @param            $model
		 * @param Repository $repository
		 * @return mixed
		 */
		public abstract function apply($model, Repository $repository);
	}