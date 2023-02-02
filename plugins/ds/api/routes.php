<?php

Route::group([

	'prefix' => 'api/v1',
	'middleware' => ['web', 'Ds\Api\Classes\Middleware']

], function () {
	Route::group(['prefix' => 'pages'], function () {

		Route::get('ids', function () {

			$data = [];

			return response()->json($data, 200);
		});

		Route::get('load/{id}', function ($id) {
			$input = Input::all();

			$data = [];

			return response()->json($data, 200);
		});
	});

	Route::group(['prefix' => 'blog'], function () {

		Route::get('posts', function () {
			$data = [];

			return response()->json($data, 200);
		});
	});
});