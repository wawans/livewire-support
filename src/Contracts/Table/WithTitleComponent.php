<?php

namespace Wawans\LivewireSupport\Contracts\Table;

/**
 * @property-read string $title
 */
interface WithTitleComponent
{
    /**
     * Table Title.
     *
     * @return string
     */
    public function getTitleProperty();
}
