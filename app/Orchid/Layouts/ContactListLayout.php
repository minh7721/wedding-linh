<?php

namespace App\Orchid\Layouts;

use App\Enums\ActiveStatus;
use App\Models\Contact;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ContactListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contacts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->alignCenter()->class('fw-bold'),
            TD::make('name', 'Tên'),
            TD::make('message', 'Tin nhắn')->width(600),
            TD::make('status', 'Trạng thái')->alignCenter()->render(function (Contact $contact) {
                if ($contact->status == 1) {
                    [$color, $content] = ['success', 'Chắc chắn sẽ tham dự'];
                } elseif($contact->status == 2) {
                    [$color, $content] = ['warning', 'Chưa chắc sẽ tham dự'];
                }else{
                    [$color, $content] = ['danger', 'Không tham dự'];

                }

                return view('admin.label', [
                    'color'   => $color,
                    'content' => $content,
                ]);
            }),
            TD::make('created_at', 'Thời gian tạo')->alignCenter()->render(function (Contact $contact){
                return $contact->created_at->toDateTimeString();
            }),

        ];
    }
}
