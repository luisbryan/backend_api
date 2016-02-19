<?php
	namespace Testu\Repositories\Eloquent;


	use Illuminate\Container\Container as App;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Collection;
	use Testu\Entities\TestQuestion;
	use Testu\Repositories\Contracts\CriteriaInterface;
	use Testu\Repositories\Contracts\RepositoryInterface;
	use Testu\Repositories\Criteria\Criteria;
	use Testu\Repositories\Exceptions\RepositoryException;

	abstract class Repository implements RepositoryInterface, CriteriaInterface
	{
		private $app;

		protected $model;

		protected $criteria;

		protected $skipCriteria = false;

		/**
		 * Repository constructor.
		 * @param $app
		 */
		public function __construct(App $app, Collection $collection)
		{
			$this->app = $app;
			$this->criteria = $collection;
			$this->resetScope();
			$this->makeModel();
		}

		abstract function model();

		/**
		 * @param array $columns
		 * @return mixed
		 */
		public function all(array $columns = array('*')) {
			$this->applyCriteria();
			return $this->model->get($columns);
		}

		/**
		 * @param int $perPage
		 * @param array $columns
		 * @return mixed
		 */
		public function paginate($perPage = 15, array $columns = array('*')) {
			$this->applyCriteria();
			return $this->model->paginate($perPage, $columns);
		}

		/**
		 * @param array $data
		 * @return mixed
		 */
		public function create(array $data) {
			return $this->model->create($data);
		}

		/**
		 * @param array $data
		 * @param $id
		 * @param string $attribute
		 * @return mixed
		 */
		public function update($id, array $data, $attribute = 'id') {
			return $this->model->where($attribute, '=', $id)->update($data);
		}

		/**
		 * @param $id
		 * @return mixed
		 */
		public function delete($id) {
			return $this->model->destroy($id);
		}

		/**
		 * @param $id
		 * @param array $columns
		 * @return mixed
		 */
		public function find($id, array $columns = array('*')) {
			$this->applyCriteria();
			return $this->model->find($id, $columns);
		}

		/**
		 * @param $attribute
		 * @param $value
		 * @param array $columns
		 * @return mixed
		 */
		public function findBy($attribute, $value, array $columns = array('*'))  {
			 $this->applyCriteria();
			return $this->model->where($attribute, '=', $value)->first($columns);
		}

		/**
		 * @return Model
		 * @throws RepositoryException
		 */
		private function makeModel()
		{
			$model = $this->app->make($this->model());

			if (! $model instanceof Model) {
				throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
			}

			return $this->model = $model;
		}

		/**
		 * @return $this
		 */
		public function resetScope() {
			$this->skipCriteria(false);
			return $this;
		}

		/**
		 * @param bool $status
		 * @return $this
		 */
		public function skipCriteria($status = true){
			$this->skipCriteria = $status;
			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCriteria() {
			return $this->criteria;
		}

		/**
		 * @param Criteria $criteria
		 * @return $this
		 */
		public function getByCriteria(Criteria $criteria) {
			$this->model = $criteria->apply($this->model, $this);
			return $this;
		}

		/**
		 * @param Criteria $criteria
		 * @return $this
		 */
		public function pushCriteria(Criteria $criteria) {
			$this->criteria->push($criteria);
			return $this;
		}

		/**
		 * @return $this
		 */
		public function  applyCriteria() {
			if($this->skipCriteria === true)
				return $this;

			foreach($this->getCriteria() as $criteria) {
				if($criteria instanceof Criteria)
					$this->model = $criteria->apply($this->model, $this);
			}

			return $this;
		}

		public function isValid()
		{

		}

	}