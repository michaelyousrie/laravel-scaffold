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

        $controllerStub = $this->inject($this->readStub("Controller"), $entityName);
        $repoStub = $this->inject($this->readStub("Repository"), $entityName);
        $resourceStub = $this->inject($this->readStub("Resource"), $entityName);
        $serviceStub = $this->inject($this->readStub("Service"), $entityName);
        $modelStub = $this->inject($this->readStub("Model"), $entityName);
        $requestStub = $this->inject($this->readStub("Request"), $entityName);

        file_put_contents("{$dirRoot}/app/Http/Controllers/Api/{$entityName}sController.php", $controllerStub);
        file_put_contents("{$dirRoot}/app/Repositories/{$entityName}Repository.php", $repoStub);
        file_put_contents("{$dirRoot}/app/Http/Resources/{$entityName}Resource.php", $resourceStub);
        file_put_contents("{$dirRoot}/app/Services/{$entityName}Service.php", $serviceStub);
        file_put_contents("{$dirRoot}/app/Models/{$entityName}.php", $modelStub);
        file_put_contents("{$dirRoot}/app/Http/Requests/Create{$entityName}Request.php", $requestStub);

        return true;
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