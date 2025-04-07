<?php

namespace App\Orchid\Resources;

use App\Models\User;
 use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;
    public static $label = 'المقالات';

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
            Input::make('slug')
                ->title('slug'),

            TextArea::make('excerpt')->title('وصف مختصر'),
            Quill::make('body')->title('الوصف'),
            Picture::make('image')
                ->width(500)
                ->height(300)
                ->horizontal(),
            Select::make('status')
                ->title('الحالة')
                ->options(['PUBLISHED' => 'PUBLISHED', 'DRAFT' => 'DRAFT', 'PENDING' => 'PENDING'])
                ->value('PUBLISHED'),
            Relation::make('user_id')
                ->fromModel(User::class, 'name')
                ->title('اختر العضو'),
                Switcher::make('featured')
                ->sendTrueOrFalse()
                ->title('مميز')
                ->placeholder('تثبيت المقال') ,
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
            TD::make('slug'),
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
            Sight::make('id'),
            Sight::make('title', 'العنوان'),
            Sight::make('slug', 'العنوان الفريد'),
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
