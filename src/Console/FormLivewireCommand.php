<?php

namespace Wawans\LivewireSupport\Console;

use Livewire\Features\SupportConsoleCommands\Commands\MakeLivewireCommand;

class FormLivewireCommand extends MakeLivewireCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire-support:form {name} {--force} {--inline} {--test} {--stub=livewire-form : If you have several stubs, stored in subfolders }';
}
