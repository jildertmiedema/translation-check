<?php
namespace JildertMiedema\TranslationCheck;

use Illuminate\Support\ServiceProvider;

class TranslationCheckerServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerCommand();

        $this->app->bind('translation.check', function($app)
        {
            $loader = $app['translation.loader'];
            return new TranslationCheck($loader);
        });

        $this->commands('command.checkTranslations');
    }


    /**
     * Register the seed console command.
     *
     * @return void
     */
    protected function registerCommand()
    {
        $this->app->bindShared('command.checkTranslations', function($app)
        {
            return new CheckCommand($app['translation.check']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('translation.check', 'command.checkTranslations');
    }
}