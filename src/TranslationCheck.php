<?php
namespace JildertMiedema\TranslationCheck;

use Illuminate\Filesystem\Filesystem;

class TranslationCheck
{

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    public function __construct(Filesystem $files, $path)
    {
        $this->path = $path;
        $this->files = $files;
    }

    public function check(OutputInterface $output)
    {
        $wordParts = $this->getAllTranslations();

        $keys = $this->getAllKeys($wordParts);

        $this->checkLanguages($wordParts, $keys, $output);
    }

    private function checkLanguages($wordParts, $keys, $output)
    {
        $found = false;
        foreach($wordParts as $language => $translations) {
            foreach ($keys as $key) {
                if (!isset($translations[$key])) {
                    $found = true;
                    $output->output(sprintf('%s: has no %s'."\n", $language, $key));
                }
            }
        }
        if (! $found) {
            $output->output('All translations found for: ' . implode(', ', array_keys($wordParts)));
        }
    }

    private function getAllKeys($wordParts)
    {
        $keys = array();
        foreach($wordParts as $translations) {
            $keys = array_merge($keys, array_keys($translations));
        }
        return array_unique($keys);
    }

    private function getAllTranslations()
    {
        $wordParts = array();
        $languages = $this->files->directories($this->path);

        foreach ($languages as $language) {
            $data = $this->parseDir($language);
            $wordParts[basename($language)] = array_dot($data);
        }

        return $wordParts;
    }

    private function parseDir($dir)
    {
        $items = array();
        $files = $this->files->files($dir);

        foreach ($files as $file) {
            $name = basename($file);
            $name = str_replace('.php', '', $name);
            $items[$name] = require($file);
        }

        $dirs = $this->files->directories($dir);

        foreach ($dirs as $dir) {
            $name = basename($dir);
            $items[$name] = $this->parseDir($dir);
        }

        return $items;
    }
}