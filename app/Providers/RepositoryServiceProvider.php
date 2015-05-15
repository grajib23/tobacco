<?php namespace App\Providers;

use App\Decorators\Cache\CommentCache;
use App\Decorators\Cache\NewsCache;
use App\Decorators\Cache\PostCache;
use App\Decorators\Cache\QuestionAnswerCache;
use App\Decorators\Cache\QuestionCache;
use App\Decorators\Cache\QuestionTypeCache;
use App\Decorators\Cache\UserCache;
use App\Decorators\Validators\CommentValidator;
use App\Decorators\Validators\NewsValidator;
use App\Decorators\Validators\PostValidator;
use App\Decorators\Validators\QuestionAnswerValidator;
use App\Decorators\Validators\QuestionTypeValidator;
use App\Decorators\Validators\QuestionValidator;
use App\Decorators\Validators\UserValidator;
use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionType;
use App\Models\User;
use App\Repositories\Comment\EloquentCommentRepository;
use App\Repositories\News\EloquentNewsRepository;
use App\Repositories\Post\EloquentPostRepository;
use App\Repositories\Question\EloquentQuestionRepository;
use App\Repositories\QuestionAnswer\EloquentQuestionAnswerRepository;
use App\Repositories\QuestionType\EloquentQuestionTypeRepository;
use App\Repositories\User\EloquentUserRepository;
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
        $app->bind('App\Repositories\User\UserRepository',function(){
            $user =  new EloquentUserRepository(new User());
            $cacheService = Cache::driver();
            $cache = new UserCache($cacheService,$user);
            $validator = App::make('validator');
            return new UserValidator($validator,$cache);
        });

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

        $app->bind('App\Repositories\QuestionType\QuestionTypeRepository',function(){
            $questionType =  new EloquentQuestionTypeRepository(new QuestionType());
            $cacheService = Cache::driver();
            $cache = new QuestionTypeCache($cacheService,$questionType);
            $validator = App::make('validator');
            return new QuestionTypeValidator($validator,$cache);
        });

        $app->bind('App\Repositories\Question\QuestionRepository',function(){
            $question =  new EloquentQuestionRepository(new Question());
            $cacheService = Cache::driver();
            $cache = new QuestionCache($cacheService,$question);
            $validator = App::make('validator');
            return new QuestionValidator($validator,$cache);
        });

        $app->bind('App\Repositories\QuestionAnswer\QuestionAnswerRepository',function(){
            $questionAnswer =  new EloquentQuestionAnswerRepository(new Question(), new QuestionAnswer());
            $cacheService = Cache::driver();
            $cache = new QuestionAnswerCache($cacheService,$questionAnswer);
            $validator = App::make('validator');
            return new QuestionAnswerValidator($validator,$cache);
        });
	}

}
