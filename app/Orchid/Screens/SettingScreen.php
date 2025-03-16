<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Screen;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Radio;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Setting\Facades\Setting;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SettingScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
         return [
            'website' =>  Setting::getNoCache('website'),
            'site_open' =>  Setting::getNoCache('site_open'),
            'site_name' => Setting::getNoCache('site_name'),
            'site_logo' => Setting::getNoCache('site_logo'),
            'site_description' => Setting::getNoCache('site_description'),
            'mobile' => Setting::getNoCache('mobile'),
            'email' => Setting::getNoCache('email'),
            'advertiser_ratio' => Setting::getNoCache('advertiser_ratio'),
            'fixed_amount' => Setting::getNoCache('fixed_amount'),
            'facebook' => Setting::getNoCache('facebook'),
            'twitter' => Setting::getNoCache('twitter'),
            'site_status' => Setting::getNoCache('site_status'),
            'site_social' => Setting::getNoCache('site_status'),
            'site_more_links' => Setting::getNoCache('site_status'),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'setting';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
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
                Layout::rows([
                    Input::make('site_name')
                        ->title('اسم الموقع')
                        ->placeholder('ادخل اسم الموقع')
                        ->required(),
                    Picture::make('site_logo')
                        ->errorMaxSizeMessage("File size is too large")
                        ->errorTypeMessage("Invalid file type"),
                    TextArea::make('site_description')
                        ->title('وصف الموقع')
                        ->rows(6),
                    Input::make('email')
                        ->title('البريد الالكتروني')
                        ->placeholder('البريد الالكتروني'),
                    Input::make('mobile')
                        ->title('رقم الجوال')
                        ->placeholder('رقم الجوال'),
                    Group::make([
                        Radio::make('site_status')
                            ->placeholder('تشغيل الموقع')
                            ->value('1')
                            ->title('حالة الموقع'),
                        Radio::make('site_status')
                            ->placeholder('تعطيل الموقع')
                            ->value('0'),
                    ])
                        ->autoWidth()
                        ->alignEnd(),



                ])->title('الاعدادات العامة'),

                Layout::rows([
                    Input::make('fixed_amount')
                        ->title(' السعر الثابت  ')
                        ->placeholder('ادخل السعر الثابت  ')
                        ->required(),

                    Input::make('advertiser_ratio')
                        ->title('اسم نسبة المعلن')
                        ->placeholder('ادخل  نسبة المعلن  ')
                        ->required(),

                ])->title('اعدادات الاسعار'),

            ]),
            Layout::columns([

                Layout::rows([
                    Input::make('facebook')
                        ->title(' رابط فيس بوك ')
                        ->placeholder('ادخل رابط فيس بوك ')
                        ->required(),

                    Input::make('twitter')
                        ->title('رابط منصة x')
                        ->placeholder('ادخل رابط منصة x')
                        ->required(),

                ])->title(' مواقع التواصل الاجتماعي  '),

            ])
        ];
    }


    public function save(Request $request): void
    {
        Cache::flush();
        $settings = $request->only('site_name', 'site_logo', 'site_description', 'mobile', 'email', 'advertiser_ratio', 'fixed_amount', 'facebook', 'twitter', 'site_status');
        foreach ($settings as $key => $value) {
            Setting::set($key, $value ?? '');
        }
 
        Toast::info(__('Setting updated.'));
    }
}
