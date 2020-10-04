<?php

namespace LaravelScaffold\Commands;

use Illuminate\Console\Command;

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

        $this->artisan("make:controller Api/{$pluralEntityName}Controller");
        $this->artisan("make:model {$entityName} -m");
        $this->artisan("make:resource {$entityName}Resource");
        $this->artisan("make:request Create{$entityName}Request");

        $repoStub = $this->inject($this->readStub("Repository"), $entityName);
        $serviceStub = $this->inject($this->readStub("Service"), $entityName);

        $reposDir = "{$dirRoot}/app/Repositories";
        $servicesDir = "{$dirRoot}/app/Services";

        if (!file_exists($reposDir)) {
            mkdir($reposDir);
        }

        if (!file_exists($servicesDir)) {
            mkdir($servicesDir);
        }

        file_put_contents("{$reposDir}/{$entityName}Repository.php", $repoStub);
        file_put_contents("{$servicesDir}/{$entityName}Service.php", $serviceStub);

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

    private function inject(string $stub, string $name)
    {
        return str_replace('{$name}', $name, $stub);
    }
}
