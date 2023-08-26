<?php

namespace Wawans\LivewireSupport\Concerns;

use Illuminate\Database\Eloquent\Model;

trait WithModel
{
    /**
     * Model primary key (route key).
     *
     * @var Model|int|string
     */
    public $model;

    /**
     * Mount component.
     *
     * @param $model
     * @return void
     */
    public function mountWithModel($model = null)
    {
        if ($model instanceof Model) {
            $this->model = $model->getRouteKey();
        }
    }
}
