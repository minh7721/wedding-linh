<?php

namespace App\Orchid\Screens;

use App\Models\Contact;
use App\Orchid\Layouts\ContactListLayout;
use App\Orchid\Layouts\Filter\ContactFilterLayout;
use Orchid\Screen\Screen;

class ContactListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'contacts' => Contact::filters(ContactFilterLayout::class)->defaultSort('id', 'desc')->paginate(20),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách người điền form';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ContactFilterLayout::class,
            ContactListLayout::class,
        ];
    }
}
