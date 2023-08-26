<?php

namespace Wawans\LivewireSupport\Components\Table;

use Livewire\Component;
use Livewire\WithPagination;
use Wawans\LivewireSupport\Concerns\WithTable;
use Wawans\LivewireSupport\Concerns\WithPaginationView;
use Wawans\LivewireSupport\Contracts\TableComponent;
use Wawans\LivewireSupport\Contracts\Table\WithFilterComponent;
use Wawans\LivewireSupport\Contracts\Table\WithHeaderComponent;
use Wawans\LivewireSupport\Contracts\Table\WithTitleComponent;

abstract class Table extends Component implements TableComponent
{
    use WithTable;
    use WithPagination;
}
