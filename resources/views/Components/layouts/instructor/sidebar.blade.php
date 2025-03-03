<!-- Sidebar -->
<div id="hs-sidebar-basic-usage" class="lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-fit lg:w-64 hs-overlay-open:translate-x-0 transition-all duration-300 transform h-full fixed top-0 start-0 bottom-0 z-[60] bg-white border-e border-gray-200" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <!-- Header -->
        <header class="p-4 flex justify-between items-center gap-x-2">
            <!-- Logo -->
            <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 transition-all duration-300" href="#" aria-label="Brand">
                <span class="hidden lg:block">E-learning</span>
                <span class="block lg:hidden">E</span>
            </a>
        </header>
        <!-- End Header -->

        <!-- Body -->
        <nav class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <div class="pb-0 px-2 w-fit lg:w-full  flex flex-col flex-wrap">
                <ul class="space-y-1">

<<<<<<< HEAD
                    <x-layouts.instructor.nav href="/admin" :active="request()->is('instructor')" wire:navigate>
=======
                    <x-layouts.instructor.nav href="/instructors/{{ Auth::user()->id }}" :active="request()->is('instructors/' . Auth::user()->id)" wire:navigate>
>>>>>>> 98fde8b (initial)
                        <svg class="w-4 text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        <span class="hidden lg:block"> لوحة تحكم </span>
                    </x-layouts.instructor.nav>

<<<<<<< HEAD
=======
                    <x-layouts.instructor.nav href="/instructors/{{ Auth::user()->id }}/courses" :active='request()->is("instructors/" . Auth::id() . "/courses")' wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span class="hidden lg:block"> كورساتي </span>
                    </x-layouts.instructor.nav>

>>>>>>> 98fde8b (initial)
                    <x-layouts.instructor.nav href="/logout" :active="request()->is('logout')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>

                        <span class="hidden lg:block">تسجيل خروج </span>
                    </x-layouts.instructor.nav>

                </ul>
            </div>
        </nav>
        <!-- End Body -->
    </div>
</div>
<!-- End Sidebar -->
