<div class="flex flex-col gap-4 border rounded-md bg-white shadow-lg border-gray-300 p-4 max-w-full md:max-w-4xl mx-auto mt-10">
    <!-- Header Section -->
    <header class="p-4 flex flex-col md:flex-row items-center justify-between border-b border-gray-300 gap-4">

        <!-- Search Input -->
        <div class="relative flex items-center w-full md:w-auto">
            <input
                type="text"
                placeholder="إبحث عن مخاضر معين"
                wire:model.live="searchText"
                class="bg-neutral-100 rounded-md px-3 border border-transparent py-2 pl-10 w-full placeholder:text-neutral-400 outline-none  focus:border-primary"
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 w-5 h-5 text-neutral-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35M15 11a4 4 0 11-8 0 4 4 0 018 0z"
                />
            </svg>
        </div>

    </header>


    <div class="overflow-x-auto">
        @if($instructors->count() > 0)
            <table class="min-w-full bg-white border-t-none border-b border-gray-300 rounded-md mb-10">
                <thead class="border-b border-gray-300 rounded-md">
                <tr>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-start">الصورة</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">البريد الإلكتروني</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center"> عدد كورسات الخاصة به </th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($instructors as $i => $instructor)
                    <tr>
                        <td class="p-3 text-sm text-gray-800 text-center">{{ $i + 1 }}</td>
                        <td class="p-3 text-sm text-gray-800">
                            <div class="flex items-center gap-4">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($instructor->profile_url) }}" alt="Course Image" class="w-10 h-10 rounded-md" />
                                <a href="#" class="transition duration-300 hover:underline hover:text-primary text-center text-xs">
                                    {{ $instructor->name }}
                                </a>
                            </div>
                        </td>
                        <td class="p-3 text-sm text-gray-800 text-center">
                            {{ $instructor->email }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 text-center">
                            {{ $instructor->courses->count() === 0 ? 'لا يمتلك أي دورة' : $instructor->courses->count() }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 text-center">
                            <div class="flex justify-center gap-4">
                                <a href="courses/{{ $instructor->id }}/edit" class="text-blue-600 hover:text-blue-800" wire:navigate>تعديل</a>
                                <button class="text-red-600 hover:text-red-800" wire:click="delete({{ $instructor }})" wire:navigate>حذف</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="flex items-center justify-between flex-row px-4">
                <div>
                    @if($instructors->onFirstPage())
                        <span  class="bg-primary/80 cursor-not-allowed  py-1 px-3  rounded-md text-white">السابق</span>
                    @else
                        <a href="{{ $instructors->previousPageUrl() }}" class="bg-primary hover:bg-primary/80 py-1 px-3 transition duration-300 rounded-md text-white">السابق</a>
                    @endif
                </div>

                <div>
                    <span class="text-gray-600">عرض {{ $instructors->firstItem() }} إلى {{ $instructors->lastItem() }} من أصل {{ $instructors->total() }}</span>
                </div>

                <div>
                    @if($instructors->hasMorePages())
                        <a href="{{ $instructors->nextPageUrl() }}" class="bg-primary hover:bg-primary/80 py-1 px-3 transition duration-300 rounded-md text-white">التالي</a>
                    @else
                        <span  class="bg-primary/80 cursor-not-allowed  py-1 px-3  rounded-md text-white">التالي</span>
                    @endif
                </div>
            </div>

            <div class="flex justify-center mt-4">

                @else
                    <div class="w-full my-10 mx-auto text-center">
                        <p class="text-secondary">لا يوجد محاضرين , يرجى المحاولة مرة أخرى</p>
                    </div>
                @endif
            </div>
    </div>
</div>
