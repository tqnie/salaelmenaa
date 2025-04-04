<?php

namespace App\Orchid\Resources;

use App\Models\Product;
use App\Models\User;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class OfferResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Offer::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        //'id','title','body','views','image','video','user_id','product_id','type','status'
        return [
            Input::make('title')
                ->title('الاسم')
                ->placeholder('ادخل الاسم هنا'),

            TextArea::make('body')->title('الوصف'),
            Cropper::make('image')
                ->width(500)
                ->height(300)
                ->horizontal(),
            Input::make('video')
                ->title('فيديو'),
            Select::make('type')
                ->title('نوع الاعلان')
                ->options(['seller' => 'seller', 'buyer' => 'buyer'])
                ->value('seller'),
            Relation::make('user_id')
                ->fromModel(User::class, 'name')
                ->title('اختر العضو'),
            Relation::make('product_id')
                ->fromModel(Product::class, 'title')
                ->title('المنتج'),
            Select::make('status')
                ->title('الحالة')
                ->options(['pending'=>'pending', 'approved'=>'approved', 'rejected'=>'rejected'])
                ->value('accepted'),
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
            TD::make('title', 'العنوان'),
            TD::make('user_id', 'رقم العضو'),
            TD::make('type', 'النوع'),
            TD::make('product_id', 'رقم المنتج'),
            TD::make('status', 'الحالة'),
            TD::make('created_at', 'تاريخ الانشاء')
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
