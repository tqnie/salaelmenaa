<?php

namespace App\Orchid\Resources;

use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;
use App\Models\Offer;
use App\Orchid\Actions\OfferStatusAction;
use Orchid\Screen\Actions\Button;
use Illuminate\Http\Request;

class OfferResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model =  Offer::class;

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
            Relation::make('to_user_id')
                ->fromModel(User::class, 'name')
                ->title(' الي العضو  '),
            Relation::make('product_id')
                ->fromModel(Product::class, 'title')
                ->title('المنتج'),
            Select::make('status')
                ->title('الحالة')
                ->options(['pending' => 'pending', 'approved' => 'approved', 'rejected' => 'rejected'])
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
            TD::make('to_user_id', ' الي العضو '),
            TD::make('product_id', 'رقم المنتج'),
            TD::make('تفعيل')
                ->align(TD::ALIGN_CENTER)
                ->render(function ($model) {
                    if ($model->status !== 'approved') {
                        return Button::make('تفعيل')
                            ->method('updateStatus')
                            ->parameters([
                                'id' => $model->id,
                            ])
                            ->class('btn btn-sm btn-success');
                    }

                    return 'مفعل';
                }),
            TD::make('created_at', 'تاريخ الانشاء')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
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
    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(): array
    {
        return [
            OfferStatusAction::class,
        ];
    }




    public function updateStatus(Request $request)
    {
        $model = Offer::find($request->get('id'));

        $user = User::find($model->user_id);

        $subscription = Subscription::where('user_id', $user->id)
            ->where('status', 'accepted')
            ->first();

        if ($subscription) {
            if ($subscription->quantity > 0) {
                $subscription->decrement('quantity');
                $model->update(['status' => 'approved']);
                Toast::info('تم التفعيل بنجاح');
            } else {
                $subscription->update(['status' => 'complated']);
                Toast::info('الاشتراك مكتمل ولا يمكن التفعيل');
            }
        } else {
            Toast::warning('لا يوجد اشتراك مفعل لهذا المستخدم');
        }

       // return redirect()->back();
    }
}
