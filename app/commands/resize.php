<?php namespace users;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Keboola\Csv\CsvFile;

class resize extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'users:resize';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run users\' avatars resize.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$users = new CsvFile($this->argument('path'), ';');
        
		foreach($users as $user) 
        {
            $this->info('Processing user id#' . $user[0]);
            
            if(isset($user[3]) && trim($user[3]) !== '' && filter_var($user[3], FILTER_VALIDATE_URL) !== FALSE)
    		{
                $this->info('Resizing avatar for user id#' . $user[0]);
                \Queue::push('Resize', array('resize_to_width' => 200, 'resize_to_height' => 300, 'source_image_url' => $user[3], 'save_original' => $this->option('originals'), 'user_id' => $user[0]));
            }
		}	
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('path', InputArgument::REQUIRED, 'Path to .csv file.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('originals', null, InputOption::VALUE_NONE, 'Save original images', null),
		);
	}
}