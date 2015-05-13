<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use LucaDegasperi\OAuth2Server\Storage\FluentClient;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ClientCreatorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'oauth2-server:create-client';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new OAuth Client';

    /**
     * @var FluentClient
     */
    protected $clientRepo;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(FluentClient $clientRepo)
	{
		parent::__construct();
        $this->clientRepo = $clientRepo;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $clientName = $this->argument('clientName');
        $clientId = $this->argument('clientId');
        $clientSecret = $this->argument('clientSecret');

        $this->clientRepo->create($clientName, $clientId, $clientSecret);
        $this->info('Client created successfully');
        $this->info('Client Name: '.$clientName);
        $this->info('Client ID: '.$clientId);
        $this->info('Client Secret: '.$clientSecret);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
        return [
            ['clientName', InputArgument::REQUIRED, 'The Client\'s name'],
            ['clientId', InputArgument::OPTIONAL, 'Client ID to use. A random one will be generated if none is provided.', Str::random()],
            ['clientSecret', InputArgument::OPTIONAL, 'Client Secret to use. A random one will be generated if none is provided.', Str::random(32)]
        ];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
