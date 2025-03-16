<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Setting\Facades\Setting;

class HomeSettingScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
         return [
            'slider_title' =>  Setting::getNoCache('slider_title'),
            'slider_desc' =>  Setting::getNoCache('slider_desc'),
            'slider_url' => Setting::getNoCache('slider_url'),
            'slider_url' => Setting::getNoCache('slider_url'),
            'section1_list' => Setting::getNoCache('section1_list'),
            'section2_title' => Setting::getNoCache('section2_title'),
            'section2_desc' => Setting::getNoCache('section2_desc'),
            'section3_title' => Setting::getNoCache('section3_title')
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'HomeSettingScreen';
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
        return [];
    }
}
