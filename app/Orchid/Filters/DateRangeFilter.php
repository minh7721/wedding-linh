<?php

namespace App\Orchid\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateRange;

class DateRangeFilter extends Filter
{
    private string $fieldName;
    private string $title;
    private string|null $relation;

    public static function make(string $fieldName, string $title, ?string $relation = null) : DateRangeFilter
    {
        return new self($fieldName, $title, $relation);
    }

    public function __construct(string $fieldName, string $title, ?string $relation,)
    {
        parent::__construct();
        $this->fieldName = $fieldName;
        $this->title     = $title;
        $this->relation  = $relation;
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters() : ?array
    {
        return [$this->fieldName];
    }

    /**
     * Apply to a given Eloquent query builder.
     *
     * @param  Builder  $builder
     *
     * @return Builder
     */
    public function run(Builder $builder) : Builder
    {
        $dateRange = $this->request->input($this->fieldName);
        $start     = Arr::get($dateRange, 'start');
        $end       = Arr::get($dateRange, 'end');
        if (!$start || !$end) {
            $start = $end = now()->toDateString();
        }
        $startTime = Carbon::createFromFormat('Y-m-d', $start)->setTime(0, 0)->toDateTimeString();
        $endTime   = Carbon::createFromFormat('Y-m-d', $end)->setTime(23, 59, 59)->toDateTimeString();

        return $builder->where($this->fieldName, '>=', $startTime)->where($this->fieldName, '<=', $endTime);
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display() : iterable
    {
        return [
            DateRange::make($this->fieldName)
                ->title($this->title)
                ->value($this->request->input($this->fieldName)),
        ];
    }
}
