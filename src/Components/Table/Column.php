<?php

namespace Wawans\LivewireSupport\Components\Table;

class Column
{
    /**
     * Column model key.
     *
     * @var string
     */
    public $key;

    /**
     * Column label.
     *
     * @var string
     */
    public $label;

    /**
     * Component to render.
     *
     * @var string
     */
    public $component = 'livewire-support::table-cell';

    /**
     * @var \Illuminate\Contracts\View\View|\Closure|string
     */
    public $view;

    /**
     * @var bool
     */
    public $sortable = false;

    /**
     * @var \Closure
     */
    protected $valueCallback;

    /**
     * @var string
     */
    public $className = '';

    /**
     * Create a new Column instance.
     *
     * @param string $key
     * @param string $label
     */
    public function __construct(string $key, string $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    /**
     * @param $key
     * @param $label
     * @return Column
     */
    public static function make($key, $label)
    {
        return new static($key, $label);
    }

    /**
     * @param \Illuminate\Contracts\View\View|\Closure|string $component
     * @return Column
     */
    public function component(string $component)
    {
        $this->component = $component;

        return $this;
    }

    /**
     * @param \Illuminate\Contracts\View\View|\Closure|string $view
     * @return Column
     */
    public function view(string $view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @param bool $sortable
     * @return $this
     */
    public function sortable(bool $sortable = true)
    {
        $this->sortable = $sortable;

        return $this;
    }

    /**
     * @param \Closure $callback(mixed $value, int $row, int $index)
     * @return $this
     */
    public function format(\Closure $callback)
    {
        $this->valueCallback = $callback;

        return $this;
    }

    /**
     * @param string|null $className
     * @return $this
     */
    public function className(string $className = '')
    {
        $this->className = $className;

        return $this;
    }

    public function getValue($row, $index = null)
    {
        $value = data_get($row, $this->key);

        if (isset($this->valueCallback)) {
            $value = ($this->valueCallback)($value , $row, $index );
        }

        return $value;
    }
}
