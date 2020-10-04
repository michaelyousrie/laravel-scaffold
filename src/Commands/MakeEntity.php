<?php

namespace LaravelScaffold\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:entity {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new laravel scaffold entity...';

    protected $dirs = [
        [
            "stub"      => "Controller",
            "dir"       => "app/Http/Controllers/Api",
            "plural"    => true,
            "suffix"    => "Controller"
        ],
        [
            "stub"      => "Repository",
            "dir"       => "app/Repositories",
            "plural"    => false,
            "suffix"    => "Repository"
        ],
        [
            "stub"      => "Request",
            "dir"       => "app/Http/Requests",
            "plural"    => false,
            "suffix"    => "Request"
        ],
        [
            "stub"      => "Resource",
            "dir"       => "app/Http/Resources",
            "plural"    => false,
            "suffix"    => "Resource"
        ],
        [
            "stub"      => "Service",
            "dir"       => "app/Services",
            "plural"    => false,
            "suffix"    => "Service"
        ],
    ];

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
     * @return int
     */
    public function handle()
    {
        $this->generateEntity($this->argument('name'), base_path());
        $this->info("Generated successfully!");

        return 0;
    }

    private function generateEntity(string $entityName, string $dirRoot)
    {
        $entityName = ucfirst(strtolower($entityName));
        $pluralEntityName = $this->pluralize($entityName);

        foreach ($this->dirs as $dir) {
            $stub = $this->inject(
                $this->readStub($dir['stub']),
                $entityName,
                $pluralEntityName
            );

            $fullDir = "{$dirRoot}/{$dir['dir']}";

            if (!file_exists($fullDir)) {
                mkdir($fullDir);
            }

            $fileDir = "{$fullDir}/{$entityName}{$dir['suffix']}.php";
            if ($dir['plural'] == true) {
                $fileDir = "{$fullDir}/{$pluralEntityName}{$dir['suffix']}.php";
            }

            file_put_contents($fileDir, $stub);
        }

        Artisan::call("make:model {$entityName} -m");

        return true;
    }

    /**
     * Pluralizes a word if quantity is not one.
     *
     * @param int $quantity Number of items
     * @param string $singular Singular form of word
     * @param string $plural Plural form of word; function will attempt to deduce plural form from singular if not provided
     * @return string Pluralized word if quantity is not one, otherwise singular
     */
    private function pluralize($singular)
    {
        $last_letter = strtolower($singular[strlen($singular) - 1]);
        switch ($last_letter) {
            case 'y':
                return substr($singular, 0, -1) . 'ies';
            case 's':
                return $singular . 'es';
            default:
                return $singular . 's';
        }
    }

    private function readStub(string $file)
    {
        $currentDir = dirname(__FILE__);

        return file_get_contents("{$currentDir}/stubs/{$file}");
    }

    private function inject(string $stub, string $name, string $plural)
    {
        $stub = str_replace('{$name}', $name, $stub);
        return str_replace('{$plural}', $plural, $stub);
    }
}
