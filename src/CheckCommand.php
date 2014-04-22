<?php
namespace JildertMiedema\TranslationCheck;


use Illuminate\Console\Command;

class CheckCommand extends Command
{

    protected $checker;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        //
    }
}
