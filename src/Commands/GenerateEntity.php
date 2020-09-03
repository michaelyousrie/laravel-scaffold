<?php

namespace LaravelScaffold\Commands;

class GenerateEntity
{
    public static function execute(string $entityName, string $dirRoot)
    {
        $entityName = ucfirst(strtolower($entityName));

        $controllerStub = self::inject(self::readStub("Controller"), $entityName);
        $repoStub = self::inject(self::readStub("Repository"), $entityName);
        $resourceStub = self::inject(self::readStub("Resource"), $entityName);
        $serviceStub = self::inject(self::readStub("Service"), $entityName);
        $modelStub = self::inject(self::readStub("Model"), $entityName);

        file_put_contents("{$dirRoot}/app/Http/Controllers/Api/{$entityName}sController.php", $controllerStub);
        file_put_contents("{$dirRoot}/app/Repositories/{$entityName}Repository.php", $repoStub);
        file_put_contents("{$dirRoot}/app/Http/Resources/{$entityName}Resource.php", $resourceStub);
        file_put_contents("{$dirRoot}/app/Services/{$entityName}Service.php", $serviceStub);
        file_put_contents("{$dirRoot}/app/{$entityName}.php", $modelStub);

        return true;
    }

    private static function readStub(string $file)
    {
        $currentDir = dirname(__FILE__);

        return file_get_contents("{$currentDir}/stubs/{$file}");
    }

    private static function inject(string $stub, string $name)
    {
        return str_replace('{$name}', $name, $stub);
    }
}
