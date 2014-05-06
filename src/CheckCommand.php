<?php
namespace JildertMiedema\TranslationCheck;


use Illuminate\Console\Command;

class CheckCommand extends Command implements OutputInterface
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
    public function __construct(TranslationCheck $checker)
    {
        parent::__construct();
        $this->checker = $checker;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->checker->check($this);
    }

    public function output($text)
    {
        $this->info($text);
    }
}
