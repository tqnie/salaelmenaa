<div>
    <livewire:layout.dashboard_navigation :user="$user" />


    <section>
        <div class="container-fluid-2">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px pt-30px pb-100px">
                <div class="lg:col-start-1 lg:col-span-3">
                    <livewire:layout.dashboard_menu />

                </div>
                <!-- dashboard content -->
                <div data-aos="fade-up" class="lg:col-start-4 lg:col-span-9">

                    <div
                        class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-t-md">


                        <div class="content-wrapper py-4 px-5">

                            <div
                                class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                                <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                                    <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                        معلومات الاعلان
                                    </h2>
                                </div>

                                <div>
                                    <ul>
                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">تاريخ الاعلان</span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ $offer->created_at }}</span>
                                            </div>
                                        </li>

                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">عنوان</span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ $offer->title }}</span>
                                            </div>
                                        </li>
                                      
                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">المشاهدات </span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ $offer->views }}</span>
                                            </div>
                                        </li>

                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">االسعر </span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ $offer->price }}</span>
                                            </div>
                                        </li>

                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">الحالة</span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ stringStatus($offer->status) }}</span>
                                            </div>
                                        </li>

                                        <li
                                            class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                                            <div class="md:col-start-1 md:col-span-4">
                                                <span class="inline-block">تفاصيل اضافية</span>
                                            </div>
                                            <div class="md:col-start-5 md:col-span-8">
                                                <span class="inline-block">{{ $offer->body }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </ul>
        </div>
</div>
</div>
</section>

</div>
