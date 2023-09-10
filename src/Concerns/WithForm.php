<?php

namespace Wawans\LivewireSupport\Concerns;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait WithForm
{
    use AuthorizesRequests;
    use WithModel;
    use WithNotify;

    /**
     * Form fields.
     *
     * @var array
     */
    public $form = [];

    /**
     * Form attributes.
     *
     * @return array
     */
    public function validationAttributes(): array
    {
        $fields = method_exists($this, 'getFieldsProperty') && is_array($this->fields)
            ? collect($this->getFieldsProperty()) : collect();

        return collect($this->rules())
            ->map(function ($item, $key) use ($fields) {
                $q = $fields->where('name', $key)->first();

                return ($q && isset($q['label'])) ? $q['label'] : self::label($key);
            })
            ->all();
    }

    /**
     * Auto naming label.
     *
     * @param string $key
     * @return string|null
     */
    public static function label(string $key)
    {
        return (Lang::has($key))
            ? Lang::get($key)
            : Str::headline(Str::afterLast($key, '.'));
    }
}
