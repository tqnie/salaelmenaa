<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class PackagesResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Package::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('الاسم')
                ->placeholder('ادخل الاسم هنا'),
            Input::make('quantity')
                ->title('quantity'),
            Input::make('price')
                ->title('price'),
            TextArea::make('body')->title('وصف'),
            Picture::make('image')
                ->width(500)
                ->height(300)
                ->horizontal(),
            Select::make('status')
                ->title('الحالة')
                ->options(['ACTIVE' => 'ACTIVE', 'UNACTIVE' => 'UNACTIVE'])
                ->value('PUBLISHED'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('title'),
            TD::make('quantity'),
            TD::make('price'),
            TD::make('status'),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('title', 'العنوان'),
            Sight::make('quantity', 'العدد '),
            Sight::make('price', 'السعر '),
            Sight::make('status', 'الحالة '),
            Sight::make('body', 'المحتوي'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
