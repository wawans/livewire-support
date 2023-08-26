<?php

namespace Wawans\LivewireSupport\Contracts;

interface TableComponent
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query();

    /**
     * @return array
     */
    public function columns();
}
