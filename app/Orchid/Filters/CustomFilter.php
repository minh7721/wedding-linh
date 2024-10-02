<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class CustomFilter extends Filter
{
    private string $fieldName;
    private string $title;
    private string $operation;

    public static function make(string $fieldName, string $title, string $operation = '=') : CustomFilter
    {
        return new self($fieldName, $title, $operation);
    }

    public function __construct(string $fieldName, string $title, string $operation)
    {
        parent::__construct();
        $this->fieldName = $fieldName;
        $this->title     = $title;
        $this->operation = $operation;
    }

    /**
     * @inheritDoc
     */
    public function run(Builder $builder) : Builder
    {
        $value = $this->request->input($this->fieldName);
        if (\Schema::hasColumn($builder->getModel()->getTable(), $this->fieldName) && $value) {
            return $builder->where($this->fieldName, $this->operation, $value);
        }

        return $builder;
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display() : iterable
    {
        return [
            Input::make($this->fieldName)
                ->type('text')
                ->value($this->request->input($this->fieldName))
                ->title($this->title),
        ];
    }
}
