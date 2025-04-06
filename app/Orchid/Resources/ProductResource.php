<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Repository;
use Orchid\Screen\Sight;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Product::class;
    public static $label = 'المنتجات';
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
            TextArea::make('body')->title('الوصف'),
            Picture::make('image')
                ->width(500)
                ->height(300)
                ->horizontal(),
            Select::make('status')
                ->title('الحالة')
                ->options(['active'=>'active', 'unactive'=>'unactive'])
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
            TD::make('title', 'العنوان'),
            TD::make('slug'),
            TD::make('created_at', 'تاريخ الانشاء')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'اخر تحديث')
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
            Sight::make('title','العنوان'),
             
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
    /**
     * Action to delete a model
     *
     * @param Model $model
     *
     * @throws Exception
     */
    public function onDelete(Product $model)
    {
        $model->offers->each(function($item){
            $image_path = str_replace(
                ['https://portsalla.com/storage/', 'http://portsalla.com/storage/'],
                'storage/',
                $item->image
            );
            if (Storage::exists($image_path)) {
                Storage::delete($image_path); 
            }  
            $video_path = str_replace(
                ['https://portsalla.com/storage/', 'http://portsalla.com/storage/'],
                'storage/',
                $item->video
            );
            if (Storage::exists($video_path)) {
                Storage::delete($video_path); 
            }  
            $item->delete();
        });
        $model->productUsers->each(function($item){
            $item->delete();
        });
        $model->delete();
    }
}
