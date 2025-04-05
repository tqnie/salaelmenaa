<?php

namespace App\Orchid\Actions;

use Orchid\Screen\Actions\Button;
use App\Models\Offer;
use Illuminate\Support\Collection;

use App\Models\Subscription;
use App\Models\User;
use Orchid\Crud\Action;
use Orchid\Support\Facades\Toast;

class OfferStatusAction extends Action
{
   
   /**
     * The button of the action.
     *
     * @return Button
     */
    public function button(): Button
    {
        return Button::make('تفعيل الفيديو')->icon('bs.fire');
    }

     /**
     * Perform the action on the given models.
     *
     * @param \Illuminate\Support\Collection $models
     */
    public function handle(Collection $models)
    {
        $models->each(function ($offer) {
            $user = User::find($offer->user_id); 
            $subscription = Subscription::where('user_id', $user->id)
                ->where('status', 'accepted')
                ->first(); 
            if ($subscription) {
                if ($subscription->quantity > 0) {
                    $subscription->update(['quantity' => $subscription->quantity - 1]);
                    $offer->update(['status' => 'approved']);
                    Toast::info('تم التفعيل بنجاح');
                } else {
                    $subscription->update(['status' => 'complated']);
                    Toast::info('الاشتراك مكتمل ولا يمكن التفعيل');
                }
            } else {
                Toast::warning('لا يوجد اشتراك مفعل لهذا المستخدم');
            }
        });

     }
    

    public function confirm(): string
    {
        return 'هل أنت متأكد من التفعيل؟';
    }
}
