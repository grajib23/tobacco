<?php namespace App\Providers;

use App\Decorators\Cache\PostCache;
use App\Decorators\Validators\PostValidator;
use App\Models\Post;
use App\Repositories\Post\EloquentPostRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $app = $this->app;
        $app->bind('App\Repositories\Post\PostRepository',function(){
            $post =  new EloquentPostRepository(new Post());
            $cacheService = Cache::driver();
            $cache = new PostCache($cacheService,$post);
            $validator = App::make('validator');
            return new PostValidator($validator,$cache);
        });
	}

}
