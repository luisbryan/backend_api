<?php
	namespace Testu\Http\Controllers\Api;

	use Illuminate\Http\Request;
	use Testu\Http\Controllers\Controller;
	use Testu\Repositories\CategoryRepository as Category;
 
	class CategoryController extends Controller
	{
		protected $category;

		/**
		 * @param Category $category
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function index(Category $category)
		{
			return response()->json([
				$category->all()
			]);
		}

		/**
		 * @param          $id
		 * @param Category $category
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function show($id, Category $category)
		{
			return response()->json([
				$category->find($id)
			]);
		}

		/**
		 * @param          $id
		 * @param Request  $request
		 * @param Category $category
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function update($id, Request $request, Category $category)
		{
			$category = $category->update($id,'id', $request->all());

			return response()->json([
				$category
			]);
		}

		/**
		 * @param Request  $request
		 * @param Category $category
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function store(Request $request, Category $category)
		{
			$category = $category->create($request->all());

			return response()->json([
				$category
			]);
		}

		/**
		 * @param          $id
		 * @param Category $category
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function delete($id, Category $category)
		{
			return response()->json([
				$category->delete($id)
			]);
		}
		
		

	}