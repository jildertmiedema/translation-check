<?php
namespace JildertMiedema\TranslationCheck;

use Illuminate\Translation\LoaderInterface;

class TranslationCheck
{

    /**
     * The loader implementation.
     *
     * @var \Illuminate\Translation\LoaderInterface
     */
    protected $loader;

    /**
     * Create a new translator instance.
     *
     * @param  \Illuminate\Translation\LoaderInterface  $loader
     * @param  string  $locale
     * @return void
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function check()
    {
        dd($this->loader->load('nl', '*'));
    }
}