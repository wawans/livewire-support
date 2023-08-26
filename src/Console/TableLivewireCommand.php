<?php

namespace Wawans\LivewireSupport\Console;

use Livewire\Commands\MakeLivewireCommand;

class TableLivewireCommand extends MakeLivewireCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:table {name} {--force} {--inline=true} {--test} {--stub=livewire-table : If you have several stubs, stored in subfolders }';
}
