<!doctype html>

<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css' , 'resources/js/app.js'])
        <title> {{ $title ?? 'E-Learning' }}</title>
    </head>
    <body>
    <nav class="flex flex-row gap-4 justify-between items-center bg-primary text-white px-4">

        <div class="max-w-14">
            <img src=" {{ asset('images/logo.svg') }}" />
        </div>

        <ul class="flex flex-row items-center justify-center flex-grow">
            <x-layouts.nav href="/" :active="request()->is('/')" wire:navigate> الرئيسية </x-layouts.nav>
            <x-layouts.nav wire:navigate> عن الموقع </x-layouts.nav>
            <x-layouts.nav wire:navigate> اتصل بنا </x-layouts.nav>
        </ul>

        <div class="flex flex-row gap-4 items-center">
            @guest
                <a href="/login" wire:navigate class="bg-gold px-4 py-1 rounded-md cursor-pointer hover:bg-lightGold transition duration-300 text-white text-sm"> تسجيل الدخول </a>
                <a href="/register" wire:navigate class="bg-gold px-4 py-1 rounded-md cursor-pointer hover:bg-lightGold transition duration-300 text-white text-sm"> إنشاء حساب </a>
            @endguest

            @auth
                <a href="/logout" class="bg-gold px-4 py-1 rounded-md cursor-pointer hover:bg-lightGold transition duration-300 text-white text-sm"> تسجيل الخروج </a>
            @endauth
        </div>
    </nav>


    <main>
           {{ $slot }}
    </main>
        <!-- ========== FOOTER ========== -->
        <footer class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-primary selection:bg-white selection:text-primary">
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6 mb-10 pb-16">
                <div class="col-span-full hidden lg:col-span-1 lg:block">
                    <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white" href="#" aria-label="Brand"> E-Learning</a>
                    <p class="mt-3 text-xs sm:text-sm text-white">
                        © 2025 Abdulqdos Alabinie.
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h4 class="text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100"> المنصة </h4>

                    <div class="mt-3 grid space-y-3 text-sm">

                            <div class="flex gap-x-2 text-white hover:text-gold focus:outline-none focus:text-gray-800  flex-row items-center hover:ml-2 transition-all duration-300 " >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 text-gold mt-1">
                                    <path fill-rule="evenodd" d="M12.78 7.595a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06l3.25 3.25Zm-8.25-3.25 3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06Z" clip-rule="evenodd" />
                                </svg>


                                <a href="#"> الشروط والاحكام</a>

                            </div>

                        <div class="flex gap-x-2 text-white hover:text-gold focus:outline-none focus:text-gray-800  flex-row items-center hover:ml-2 transition-all duration-300 " >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 text-gold mt-1">
                                    <path fill-rule="evenodd" d="M12.78 7.595a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06l3.25 3.25Zm-8.25-3.25 3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06Z" clip-rule="evenodd" />
                                </svg>


                                <a href="#"> سياسة الخصوصية</a>

                            </div>
                        <p><a class="inline-flex gap-x-2 text-white hover:text-orange-500 focus:outline-none focus:text-gray-800" href="#"></a></p>
                    </div>
                </div>
                <!-- End Col -->

                <div>
                    <h4 class="text-xs font-semibold text-white hover:text-orange-500 uppercase">تواصل معنا </h4>

                    <div class="mt-3 grid space-y-3 text-sm  selection:text-orange-500">
                        <p class="flex items-center gap-x-2 text-white">
                            <svg class="w-4 h-4 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79a15.91 15.91 0 006.59 6.59l2.2-2.2a1.5 1.5 0 011.71-.33 11.72 11.72 0 003.67.59 1.5 1.5 0 011.5 1.5v3.69a1.5 1.5 0 01-1.5 1.5A19.92 19.92 0 012 4.5a1.5 1.5 0 011.5-1.5H7.2a1.5 1.5 0 011.5 1.5 11.72 11.72 0 00.59 3.67 1.5 1.5 0 01-.33 1.71l-2.2 2.2z"/>
                            </svg>
                            0916050468
                        </p>

                        <p class="flex items-center gap-x-2 text-white">
                            <svg class="w-4 h-4 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22 4H2a2 2 0 00-2 2v12a2 2 0 002 2h20a2 2 0 002-2V6a2 2 0 00-2-2zm-1.4 2L12 11.33 3.4 6h17.2zM2 18V8.67l10 6 10-6V18H2z"/>
                            </svg>
                            contact@e-learning.com
                        </p>

                        <div class="flex gap-4 mt-3">
                            <a href="#" class="text-white hover:text-orange-500">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.59-2.46.7a4.3 4.3 0 001.88-2.37 8.51 8.51 0 01-2.72 1.03 4.28 4.28 0 00-7.29 3.9A12.16 12.16 0 013 5.15a4.28 4.28 0 001.32 5.71 4.25 4.25 0 01-1.94-.54v.05a4.28 4.28 0 003.42 4.19 4.3 4.3 0 01-1.93.07 4.28 4.28 0 004 2.97A8.58 8.58 0 012 18.29a12.1 12.1 0 006.56 1.93c7.88 0 12.2-6.54 12.2-12.2 0-.19 0-.38-.02-.57A8.6 8.6 0 0022.46 6z"/>
                                </svg>
                            </a>

                            <a href="#" class="text-white hover:text-orange-500">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12c0 4.99 3.66 9.11 8.44 9.88v-7H7.9V12h2.54V9.85c0-2.5 1.49-3.89 3.76-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.88h-2.33v7C18.34 21.11 22 16.99 22 12c0-5.52-4.48-10-10-10z"/>
                                </svg>
                            </a>

                            <a href="#" class="text-white hover:text-orange-500">
                                <svg class="w-4 h4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 2h-9A5.5 5.5 0 002 7.5v9A5.5 5.5 0 007.5 22h9a5.5 5.5 0 005.5-5.5v-9A5.5 5.5 0 0016.5 2zM12 16.3a4.3 4.3 0 114.3-4.3 4.3 4.3 0 01-4.3 4.3zm5.4-7.9a1 1 0 11-1-1 1 1 0 011 1z"/>
                                </svg>
                            </a>


                        </div>
                    </div>

                </div>
                <!-- End Col -->


            </div>
            <!-- End Grid -->

            <div class="pt-5 mt-5 border-t border-white">
                <div class="sm:flex sm:justify-between sm:items-center">
                    <div class="flex flex-wrap items-center gap-3">

                        <div class="space-x-4 text-sm">
                            <a class="inline-flex gap-x-2 text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">Terms</a>
                            <a class="inline-flex gap-x-2 text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">Privacy</a>
                            <a class="inline-flex gap-x-2 text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">Status</a>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-between items-center gap-3 mt-10 lg:mt-auto">
                        <div class="mt-3 sm:hidden">
                            <a class="flex-none font-semibold text-xl text-white focus:outline-none focus:opacity-80" href="#" aria-label="Brand">E-Learning </a>
                            <p class="mt-1 text-xs sm:text-sm text-white">
                                © 2025 Preline Labs.
                            </p>
                        </div>

                        <!-- Social Brands -->
                        <div class="space-x-4">
                            <a class="inline-block text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                            <a class="inline-block text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                            </a>
                            <a class="inline-block text-white hover:text-gold focus:outline-none focus:text-gray-800" href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.362 10.11c0 .926-.756 1.681-1.681 1.681S0 11.036 0 10.111C0 9.186.756 8.43 1.68 8.43h1.682v1.68zm.846 0c0-.924.756-1.68 1.681-1.68s1.681.756 1.681 1.68v4.21c0 .924-.756 1.68-1.68 1.68a1.685 1.685 0 0 1-1.682-1.68v-4.21zM5.89 3.362c-.926 0-1.682-.756-1.682-1.681S4.964 0 5.89 0s1.68.756 1.68 1.68v1.682H5.89zm0 .846c.924 0 1.68.756 1.68 1.681S6.814 7.57 5.89 7.57H1.68C.757 7.57 0 6.814 0 5.89c0-.926.756-1.682 1.68-1.682h4.21zm6.749 1.682c0-.926.755-1.682 1.68-1.682.925 0 1.681.756 1.681 1.681s-.756 1.681-1.68 1.681h-1.681V5.89zm-.848 0c0 .924-.755 1.68-1.68 1.68A1.685 1.685 0 0 1 8.43 5.89V1.68C8.43.757 9.186 0 10.11 0c.926 0 1.681.756 1.681 1.68v4.21zm-1.681 6.748c.926 0 1.682.756 1.682 1.681S11.036 16 10.11 16s-1.681-.756-1.681-1.68v-1.682h1.68zm0-.847c-.924 0-1.68-.755-1.68-1.68 0-.925.756-1.681 1.68-1.681h4.21c.924 0 1.68.756 1.68 1.68 0 .926-.756 1.681-1.68 1.681h-4.21z"/>
                                </svg>
                            </a>
                        </div>
                        <!-- End Social Brands -->
                    </div>
                    <!-- End Col -->
                </div>
            </div>
        </footer>
    </body>
    <!-- ========== END FOOTER ========== -->
</html>
