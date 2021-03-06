<?php

namespace Dinhdjj\TypescriptTransformerExtended\Tests;

use Dinhdjj\TypescriptTransformerExtended\TypescriptTransformerExtendedServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Dinhdjj\\TypescriptTransformerExtended\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            TypescriptTransformerExtendedServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_typescript-transformer-extended_table.php.stub';
        $migration->up();
        */
    }
}
