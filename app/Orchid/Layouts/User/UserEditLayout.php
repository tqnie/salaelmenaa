<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
                Input::make('user.bio')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Bio'))
                ->placeholder(__('Bio')),
            Picture::make('user.avatar')
                ->errorMaxSizeMessage("File size is too large")
                ->errorTypeMessage("Invalid file type"),
        ];
    }
}
