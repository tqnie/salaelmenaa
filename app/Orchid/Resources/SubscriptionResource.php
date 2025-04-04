<?php

namespace App\Orchid\Resources;

use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;

class SubscriptionResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Subscription::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            // user_id,package_id,quantity,status

            Relation::make('user_id')
                ->fromModel(User::class, 'name')
                ->title('اختر العضو'),
            Relation::make('package_id')
                ->fromModel(Package::class, 'title')
                ->title('الباقة'),
            Input::make('quantity')
                ->title('عدد الفيديوهات')
                ->placeholder('ادخل عدد الفيديوهات هنا'),
            Select::make('status')
                ->title('الحالة')
                ->options([null=>'new','complated' => 'complated','accepted' => 'accepted', 'unaccepted' => 'unaccepted', 'cancel' => 'cancel'  ])
                ->value('active'),
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
        return [];
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
