<?php

namespace Wawans\LivewireSupport\Console;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Str;

class ControllerLivewireMakeCommand extends ControllerMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'livewire:controller';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'livewire:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new livewire controller class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = null;

        if ($this->option('model')) {
            $stub = '/stubs/controller.livewire.model.stub';
        } else {
            $stub = '/stubs/controller.livewire.stub';
        }

        return $this->resolveStubPath($stub);
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.'/../../'.$stub;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        $name = parent::getNameInput();

        return Str::endsWith($name, 'Controller') ? $name : $name . 'Controller';
    }
}
