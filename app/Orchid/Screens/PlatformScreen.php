<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Livewire\Subscription;
use App\Models\Active;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;
use App\Orchid\Layouts\Examples\ChartLineExample;
use App\Orchid\Layouts\Examples\ChartPieExample;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $users = User::count();
        $visitorsUsers = Active::users(20)->count();
        $visitors = Active::guests()->count();
        $offers = Offer::count();
        $productUser = ProductUser::count();
        $subscription = Subscription::count();
        $product = Product::count();
        return [
            'users'  => [
                [
                    'name'   => 'الاعضاء والزوار',
                    'values' => [$visitors, $visitorsUsers, $users],
                    'labels' => ['الزوار المتواجون', 'الاعضاء المتواجدون', 'الاعضاء'],
                ],
            ],
            'offers'  => [
                [
                    'name'   => 'الفيديوهات و الاشتراكات',
                    'values' => [$product, $subscription, $productUser, $offers],
                    'labels' => ['المنتجات', 'الاشتراكات', 'اشتراكات المنتجات', 'الفيديوهات'],
                ],
            ],

            'metrics' => [
                'users'    => ['value' => $users, 'diff' => 10.08],
                'visitorsUsers' => ['value' => $visitorsUsers, 'diff' => 0],
                'visitors' => ['value' => $visitors, 'diff' => 0],
                'orders'   => ['value' => number_format(10000), 'diff' => 0],
                'productUser'    => $productUser,
                'subscription'    => $subscription,
                'product'    => $product,
                'offers'    => $offers,
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return   'لوحة التحكم';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'اهلا بيك في لوحة تحكم سلا الميناء';
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns([
                ChartLineExample::make('charts', 'احصائيات')
                    ->description('الزيارات والمتواجون الان'),
                ChartPieExample::make('offers', 'المنتجات')
                    ->description('المنتجات والاشتراكات'),

            ]),
            Layout::metrics([
                'الاعضاء'    => 'metrics.users',
                'الاعضاء المتواجدون الان' => 'metrics.visitorsUsers',
                'الزوار المتواجدون الان' => 'metrics.visitors',
                'اشتراكات المنتجات' => 'metrics.productUser',
                'الاشتراكات' => 'metrics.subscription',
                'الفيديوهات' => 'metrics.offers',
                'المنتجات' => 'metrics.product',
            ]),
        ];
    }
}
