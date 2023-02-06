<?php

use Carbon\Carbon;
use Cms\Classes\Theme;
use RainLab\Pages\Classes\Page;
use RainLab\Pages\Classes\Router;
use RainLab\Blog\Models\Post;

Route::group([

	'prefix' => 'api/v1',
	'middleware' => ['web', 'Ds\Api\Classes\Middleware']

], function () {
	Route::group(['prefix' => 'pages'], function () {

		Route::get('slugs', function () {
			$pages = Page::all();

			$slugs = [];

			if ($pages) {
				foreach ($pages as $page) {
					$slugs[] = $page->url != '/'
						? ltrim($page->url, '/')
						: $page->url;
				}
			}

			return response()->json($slugs, 200);
		});

		Route::get('load/{id}', function ($id) {
			$slug = ($id == 'home')
				? '/'
				: '/' . $id;


			$theme = Theme::getActiveTheme();
			$router = new Router($theme);
			$page = $router->findByUrl($slug);

			if ($page) {
				return response()->json($page->viewBag, 200);
			}

			return response()->json(['error' => 'Page not found'], 500);
		});
	});

	Route::group(['prefix' => 'blog'], function () {
		Route::get('slugs', function () {
			$posts = Post::all();

			$slugs = $posts->map(function($post) {
				return $post->slug;
			})->toArray();

			return response()->json($slugs, 200);
		});

		Route::get('load/{slug}', function ($slug) {
			$post = Post::where('slug', $slug)
				->where('published', 1)
				->where('published_at', '<', Carbon::now())
				->first();

			if ($post) {
				return response()->json($post->attributes, 200);
			}

			return response()->json(['error' => 'Post not found'], 500);
		});
	});
});