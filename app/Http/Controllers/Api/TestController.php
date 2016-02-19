<?php
	namespace Testu\Http\Controllers\Api;

	use Testu\Http\Controllers\Controller;
	use Testu\Http\Requests\TestStoreRequest;
	use Testu\Repositories\Exceptions\RepositoryException;
	use Testu\Repositories\TestRepository;

	class TestController extends Controller
	{
		protected $test;

		/**
		 * TestController constructor.
		 * @param $test
		 */
		public function __construct(TestRepository $test)
		{
			$this->test = $test;
		}

		public function index ()
		{
			try {
				return response()->json([
					'status' => 'ok',
					'tests'  => $this->test->all()
				]);
			} catch (RepositoryException $ex) {
				return response()->json($ex->getMessage(), 422);
			}
		}

		public function show($id)
		{
			try {
				return response()->json([
					'status' => 'ok',
					'test' => $this->test->find($id)
				]);
			} catch (RepositoryException $ex) {
				return response()->json($ex->getMessage(), 422);
			}
		}

		public function store (TestStoreRequest $request)
		{
			try {
				$test = $this->test->create($request->all());

				return response()->json([
					'status' => 'ok',
					'test'   => $test
				]);
			} catch (RepositoryException $ex) {
				return response()->json($ex->getMessage(), 422);
			}
		}

		public function update($id, TestStoreRequest $request)
		{
			try {
				//return boolean
				$this->test->update($id, $request->all());

				return response()->json([
					'status' => 'ok'
				]);
			} catch (RepositoryException $ex) {
				return response()->json($ex->getMessage(), 422);
			}
		}

		public function delete ($id)
		{
			try {
				$this->test->delete($id);
				return response()->json([
					'status' => 'ok'
				]);
			}catch (RepositoryException $ex) {

			}
		}
	}