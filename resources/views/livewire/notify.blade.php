<div>
    <div>


        <section>
            <div class="container-fluid-2">
                <div
                    class="bg-naveBlue p-5 md:p-10 rounded-5 flex justify-center md:justify-between items-center flex-wrap gap-2">
                    <div class="flex items-center flex-wrap justify-center sm:justify-start">
                        <div class="ml-5">
                            <img src="{{ asset('/') }}assets/images/dashbord/dashbord__2.jpg" alt=""
                                class="w-27 h-27 md:w-22 md:h-22 lg:w-27 lg:h-27 rounded-full p-1 border-2 border-darkdeep7 box-content">
                        </div>
                        <div class="text-whiteColor font-bold text-center sm:text-start">
                            <h5 class="text-xl leading-1.2 mb-5px">الاحصائيات</h5>
                            <h2 class="text-2xl leading-1.24">{{ $user->name }} </h2>
                        </div>
                    </div>
                    <div class="text-center">
                        {{-- <div class="text-yellow">
                    الفواتير المفعلة  @if ($invoices) {{$invoices->count()}} @endif 
                  </div>
                  <p class="text-whiteColor">عدد الفواتير المضافة لديك  @if ($invoices) {{$invoices->count()}} @endif</p> --}}
                    </div>
                    <div>
                        <a href="{{ route('invoice.create') }}"
                            class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor rounded group text-nowrap flex gap-1 items-center">
                            اضافة فاتورة جديدة
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>



        <section>
            <div class="container-fluid-2">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px pt-30px pb-100px">
                    <div class="lg:col-start-1 lg:col-span-3">
                        <livewire:layout.dashboard_menu />

                    </div>
                    <!-- dashboard content -->
                    <div class="lg:col-start-4 lg:col-span-9">
                        <div
                            class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                            <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                لديك عدد ({{ $user->unreadNotifications->count() }}) غير مقروء
                            </h2>
                        </div>
                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">

                            <div class="overflow-auto">
                                <table class="w-full text-left text-nowrap">
                                    <thead
                                        class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                                        <tr>
                                            <th class="px-5px py-10px md:px-5">الاشعار</th>
                                            <th class="px-5px py-10px md:px-5">تفاصيل</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                                        @foreach ($user->notifications as $notification)
                                            @php
                                                $notification->markAsRead();
                                            @endphp
                                            <tr class="leading-1.8 md:leading-1.8">
                                                <th class="px-5px py-10px md:px-5 font-normal">
                                                    <p> #{{ $loop->index + 1 }} {{ $notification->data['title'] }} </p>
                                                </th>
                                                <td class="px-5px py-10px md:px-5">
                                                    <p>{{ $notification->data['body'] }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


</div>
