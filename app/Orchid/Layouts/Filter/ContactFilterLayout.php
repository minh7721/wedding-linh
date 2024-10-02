<?php

namespace App\Orchid\Layouts\Filter;

use App\Orchid\Filters\SelectFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class ContactFilterLayout extends Selection
{
    public $template = self::TEMPLATE_LINE;

    /**
     * @return Filter[]
     */
    public function filters() : iterable
    {
        return [
            SelectFilter::make('status', 'Trạng thái tham gia', [
                1 => 'Chắc chắn tham gia',
                2 => 'Chưa chắc sẽ tham gia',
                3 => 'Không tham gia',
            ]),
        ];
    }
}
