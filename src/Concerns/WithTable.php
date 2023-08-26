<?php

namespace Wawans\LivewireSupport\Concerns;

use Str;

/**
 * @mixin \Livewire\WithPagination
 */
trait WithTable
{
    /**
     * Per page pagination.
     *
     * @var int
     */
    public $perPage = 15;

    /**
     * List for Per page pagination.
     *
     * @var array|int[]
     */
    public $perPages = [10, 15, 25, 50, 100];

    /**
     * Table sort by.
     *
     * @var string|array|null
     */
    public $sortBy = null;

    /**
     * Table sort direction.
     *
     * @var string|array|null asc or desc
     */
    public $sortDirection = 'asc';

    /**
     * Table with pagination links.
     *
     * @var bool
     */
    public $withPagination = true;

    /**
     * Table with Query String URL.
     *
     * @var bool
     */
    public $withQueryString = false;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public abstract function query();

    /**
     * @return array<Column>
     */
    public abstract function columns(): array;

    /**
     * Initialize this trait.
     *
     * @return void
     */
    public function initializeWithTable()
    {
        $this->listeners = array_merge($this->listeners, [
            Str::of(static::class)->after('App\Http\Livewire\\')->replace('\\','-')->lower() . '-refresh' => '$refresh',
        ]);

        if ($this->withQueryString) {
            $this->queryString = array_merge($this->queryString, [
                'perPage', 'sortBy', 'sortDirection',
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function data()
    {
        return $this->query()
            ->when(!is_null($this->sortBy) && !blank($this->sortBy), function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                if (is_array($this->sortBy) && is_array($this->sortDirection)) {
                    foreach ($this->sortBy as $index => $item) {
                        $query->orderBy($item, $this->sortDirection[$index] ?? 'asc');
                    }
                }
                elseif (is_array($this->sortBy) && !is_array($this->sortDirection)) {
                    foreach ($this->sortBy as $item) {
                        $query->orderBy($item, $this->sortDirection);
                    }
                }
                else {
                    $query->orderBy($this->sortBy, $this->sortDirection);
                }
            })
            ->paginate($this->perPage);
    }

    public function sort($key, $direction = 'asc')
    {
        $this->resetPage();

        if ($this->sortBy === $key) {
            $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortDirection = $direction;

            return;
        }

        $this->sortBy = $key;
        $this->sortDirection = $direction;
    }

    /**
     * When property $perPage updated.
     */
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    /**
     * When property $sortDirection updated.
     *
     * @param $newValue
     */
    public function updatedSortDirection($newValue)
    {
        if (!is_array($newValue) && in_array(strtolower($newValue), ['asc', 'desc'], true) !== true) {
            $this->sortDirection = 'asc';
        }
    }

    /**
     * Render component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire-support::table');
    }
}
