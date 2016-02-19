<?php
	namespace Testu\Http\Controllers\Api;

	use Illuminate\Http\Request;
	use Testu\Http\Controllers\Controller;
	use Testu\Repositories\SuperadminRepository as Superadmin;
	use Testu\Repositories\TestRepository;

	class SuperadminController extends Controller
	{
		protected $superadmin;

		/**TestRepository
		 * @param Superadmin $superadmin
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function index(Superadmin $superadmin)
		{
			return response()->json([
				$superadmin->all()
			]);
		}

		/**
		 * @param          $id
		 * @param Superadmin $superadmin
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function show($id, Superadmin $superadmin)
		{
			return response()->json([
				$superadmin->find($id)
			]);
		}

		/**
		 * @param          $id
		 * @param Request  $request
		 * @param Superadmin $superadmin
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function update($id, Request $request, Superadmin $superadmin)
		{
			$superadmin = $superadmin->update($id,'id', $request->all());

			return response()->json([
				$superadmin
			]);
		}

		/**
		 * @param Request  $request
		 * @param Superadmin $superadmin
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function store(Request $request, Superadmin $superadmin)
		{
			$superadmin = $superadmin->create($request->all());

			return response()->json([
				$superadmin
			]);
		}

		/**
		 * @param          $id
		 * @param Superadmin $superadmin
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function delete($id, Superadmin $superadmin)
		{
			return response()->json([
				$superadmin->delete($id)
			]);
		}
		
		/**
		 * @param          $id
		 * @param Request  $request
		 * @param TestRepository $testRepository
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function approve($id, Request $request, TestRepository $testRepository)
		{
			$testRepository = $testRepository->update($id,'id', $request->all());

			return response()->json([
				$testRepository
			]);
		}
		
		/**
		 * @param          $id
		 * @param Request  $request
		 * @param TestRepository $testRepository
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function reject($id, Request $request, TestRepository $testRepository)
		{
			$testRepository = $testRepository->update($id,'id', $request->all());

			return response()->json([
				$testRepository
			]);
		}

	}