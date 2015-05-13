<?php namespace App\Providers;

use App\Decorators\Cache\CommentCache;
use App\Decorators\Cache\NewsCache;
use App\Decorators\Cache\PostCache;
use App\Decorators\Validators\CommentValidator;
use App\Decorators\Validators\NewsValidator;
use App\Decorators\Validators\PostValidator;
use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use App\Repositories\Comment\EloquentCommentRepository;
use App\Repositories\News\EloquentNewsRepository;
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

        $app->bind('App\Repositories\News\NewsRepository',function(){
            $news =  new EloquentNewsRepository(new News());
            $cacheService = Cache::driver();
            $cache = new NewsCache($cacheService,$news);
            $validator = App::make('validator');
            return new NewsValidator($validator,$cache);
        });

        $app->bind('App\Repositories\Comment\CommentRepository',function(){
            $comment =  new EloquentCommentRepository(new Comment());
            $cacheService = Cache::driver();
            $cache = new CommentCache($cacheService,$comment);
            $validator = App::make('validator');
            return new CommentValidator($validator,$cache);
        });
	}

}
