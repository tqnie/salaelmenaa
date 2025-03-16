<x-slot name="header">
    اشترك في الباقة
</x-slot>
<div class="container pt-100px pb-100px" data-aos="fade-up">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-5">
        <!-- create course left -->
        <div data-aos="fade-up" class="lg:col-start-1 lg:col-span-8">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="content-wrapper py-4 px-5">

                <form wire:submit="newSubscription"
                    class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8"
                    data-aos="fade-up">

                    <!-- Name -->

                    <div>
                        <x-input-label for="title" :value="__('طريقة الدفع')" />
                        <x-text-input wire:model="subscriptions.title" id="title" class="block mt-1 w-full"
                            type="text" name="title" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('subscriptions.title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="body" :value="__('تفاصيل الدفع')" />
                        <x-textarea-input wire:model="subscriptions.body" id="body" class="block mt-1 w-full"
                            type="text" name="body" required autofocus autocomplete="body" />
                        <x-input-error :messages="$errors->get('subscriptions.body')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('صورة الوصل الدفع')" />
                        <x-text-input wire:model="subscriptions.image" id="image" class="block mt-1 w-full"
                            type="file" name="image" required autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('subscriptions.image')" class="mt-2" />
                    </div>
                    <div>
                        <p class="flex items-center gap-0.5">
                            <svg class="feather feather-info w-14px h-14px" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            اختر الباقة 
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-30px">
                            <div>
                                <label
                                    class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">الباقة</label>
                                <div class="bg-whiteColor relative rounded-md">
                                    <select  wire:model="subscriptions.package"
                                        class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md">
                                        <option selected="">الباقات</option>
                                        @foreach (\App\Models\Package::where('status', 'active')->get() as $package)
                                            <option value="{{ $package->id }}">{{ $package->title }}</option>
                                        @endforeach
                                    </select>
                                    <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                </div>
                            </div>
                            <div>
                                <label
                                    class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">الفواتير</label>

                            </div>
                        </div>
                    </div>
            </div>
           
            <div class="mt-10 leading-1.8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-x-30px gap-y-5">
                <div data-aos="fade-up" class="lg:col-start-1 lg:col-span-4">
                    <x-primary-button class="ms-4">
                        اشتراك
                    </x-primary-button>
                </div>

                <div data-aos="fade-up" class="lg:col-start-5 lg:col-span-8">

                </div>
            </div>
        </form>
        </div>
        <!-- create course right-->
        <div data-aos="fade-up" class="lg:col-start-9 lg:col-span-4">
            <div class="p-30px border-2 border-primaryColor">
                <ul>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            اشتراك في احد الباقات
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            اضف الفاتورة
                        </p>
                    </li>
                    <li class="my-7px flex gap-10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check flex-shrink-0">
                            <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                        </svg>
                        <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                            انتظر حتي يكتمل الباقة
                        </p>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
