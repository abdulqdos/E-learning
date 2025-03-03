<div class="flex flex-col gap-4 border rounded-md bg-white shadow-lg border-gray-300 p-4 max-w-full md:max-w-4xl mx-auto">
    <!-- Header Section -->
    <header class="p-4 flex flex-col md:flex-row items-center justify-between border-b border-gray-300 gap-4">

        <!-- Search Input -->
        <div class="relative flex items-center w-full md:w-auto">
            <input
                type="text"
                placeholder="إبحث عن كورس معين"
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

        <div class="flex flex-row gap-3">

           <!-- Status -->
            <div class="relative rtl">
                <select
                    wire:model.live="status"
                    class="peer  px-4 py-2 bg-transparent pe-9 block w-full  rounded-lg text-sm border border-gray-200 focus:ring-primary disabled:opacity-50 disabled:pointer-events-none focus:pt-6
                      focus:pb-2
                      [&:not(:placeholder-shown)]:pt-6
                      [&:not(:placeholder-shown)]:pb-2
                      autofill:pt-6
                      autofill:pb-2" >
                    <option value="">الكل</option>
                    <option value="not_started">لم يبدأ</option>
                    <option value="ongoing">مستمر</option>
                    <option value="completed">مكتمل</option>
                </select>
                <label class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-gray-500
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-gray-500">الحالة </label>
            </div>

           <!-- Level -->
            <div class="relative rtl">
                <select
                    wire:model.live="level"
                    class="peer  px-4 py-2 bg-transparent pe-9 block w-full  rounded-lg text-sm border border-gray-200 focus:ring-primary disabled:opacity-50 disabled:pointer-events-none focus:pt-6
                      focus:pb-2
                      [&:not(:placeholder-shown)]:pt-6
                      [&:not(:placeholder-shown)]:pb-2
                      autofill:pt-6
                      autofill:pb-2" >
                    <option value="">الكل</option>
                    <option value="beginner">مبتدئ</option>
                    <option value="intermediate">متوسط</option>
                    <option value="advanced">متقدم</option>
                </select>
                <label class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-gray-500
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-gray-500">المستوى </label>
            </div>

            <!-- Category -->
            <div class="relative rtl">
                <select
                    wire:model.live="category"
                    class="peer  px-4 py-2 bg-transparent pe-9 block w-full  rounded-lg text-sm border border-gray-200 focus:ring-primary disabled:opacity-50 disabled:pointer-events-none focus:pt-6
                      focus:pb-2
                      [&:not(:placeholder-shown)]:pt-6
                      [&:not(:placeholder-shown)]:pb-2
                      autofill:pt-6
                      autofill:pb-2" >
                    <option value="">الكل</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
                <label class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-gray-500
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-gray-500">التخصص </label>
            </div>

            <!-- Price -->
            <div class="relative rtl">
                <select
                    wire:model.live="price"
                    class="peer  px-4 py-2 bg-transparent pe-9 block w-full  rounded-lg text-sm border border-gray-200 focus:ring-primary disabled:opacity-50 disabled:pointer-events-none focus:pt-6
                      focus:pb-2
                      [&:not(:placeholder-shown)]:pt-6
                      [&:not(:placeholder-shown)]:pb-2
                      autofill:pt-6
                      autofill:pb-2" >
                    <option value="">الكل</option>
                    <option value="free">مجانأ</option>
                    <option value="100-300">100 - 300</option>
                    <option value="300-500">300 - 500</option>
                    <option value="500-1000">500 - 1000</option>
                    <option value="1000+">+ 1000</option>
                </select>
                <label class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  peer-disabled:opacity-50 peer-disabled:pointer-events-none
                    peer-focus:text-xs
                    peer-focus:-translate-y-1.5
                    peer-focus:text-gray-500
                    peer-[:not(:placeholder-shown)]:text-xs
                    peer-[:not(:placeholder-shown)]:-translate-y-1.5
                    peer-[:not(:placeholder-shown)]:text-gray-500">السعر </label>
            </div>
        </div>


    </header>

    <!-- Table Section -->
        <div class="overflow-x-auto">
            @if($courses->count() > 0)
                <table class="min-w-full bg-white border-t-none border-b border-gray-300 rounded-md mb-10">
                    <thead class="border-b border-gray-300 rounded-md">
                    <tr>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">#</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-start">الدورة</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">السعر</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">الحالة</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">المستوى</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">المحاضر</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">القسم</th>
                        <th class="py-2 px-4 text-sm font-semibold text-gray-700 text-center">الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($courses as $i => $course)
                        <tr>
                            <td class="p-3 text-sm text-gray-800 text-center">{{ $i + 1 }}</td>
                            <td class="p-3 text-sm text-gray-800">
                                <div class="flex items-center gap-4">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($course->img_url) }}" alt="Course Image" class="w-10 h-10 rounded-md" />
                                    <a href="courses/{{ $course->id }}" class="transition duration-300 hover:underline hover:text-primary text-center text-xs">
                                        {{ $course->title }}
                                    </a>
                                </div>
                            </td>

                            <td class="p-3 text-sm text-gray-800 text-center">
                                {{ $course->price ? $course->price . ' $' : 'مجاناً' }}
                            </td>
                            <td class="p-3 text-xs text-gray-800 text-center w-32">
                                    <span class="border py-1 px-4 font-semibold rounded-md
                                        {{ $course->status === 'ongoing' ? 'border-green-600 text-green-600' :
                                                ($course->status === 'not_started' ? 'border-red-600 text-red-600' : 'border-blue-600 text-blue-600') }}">
                                        {{ $course->status === 'not_started' ? 'لم يبدأ بعد' : ($course->status === 'ongoing' ? 'مستمر' : 'مكتمل')   }}
                                    </span>
                            </td>
                            <td class="p-3 text-xs text-gray-800 text-center w-32">
                                    <span class="border py-1 px-4 font-semibold rounded-md
                                        {{ $course->level === 'beginner' ? 'border-green-600 text-green-600' :
                                                ($course->level === 'intermediate' ? 'border-blue-600 text-blue-600' : 'border-red-600 text-red-600') }}">
                                        {{ $course->level === 'beginner' ? 'مبتدئ' : ($course->level === 'intermediate' ? 'متوسط' : 'صعب')   }}
                                    </span>
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                {{ $course->instructor->name }}
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                {{ $course->category->name }}
                            </td>
                            <td class="p-3 text-sm text-gray-800 text-center">
                                <div class="flex justify-center gap-4">
                                    <a href="courses/{{ $course->id }}/edit" class="text-blue-600 hover:text-blue-800" wire:navigate>تعديل</a>
                                    <button class="text-red-600 hover:text-red-800" wire:click="delete({{ $course }})" wire:navigate>حذف</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="flex items-center justify-between flex-row px-4">
                    <div>
                        @if($courses->onFirstPage())
                            <span  class="bg-primary/80 cursor-not-allowed  py-1 px-3  rounded-md text-white">السابق</span>
                        @else
                            <a href="{{ $courses->previousPageUrl() }}" class="bg-primary hover:bg-primary/80 py-1 px-3 transition duration-300 rounded-md text-white">السابق</a>
                        @endif
                    </div>

                    <div>
                        <span class="text-gray-600">عرض {{ $courses->firstItem() }} إلى {{ $courses->lastItem() }} من أصل {{ $courses->total() }}</span>
                    </div>

                    <div>
                        @if($courses->hasMorePages())
                            <a href="{{ $courses->nextPageUrl() }}" class="bg-primary hover:bg-primary/80 py-1 px-3 transition duration-300 rounded-md text-white">التالي</a>
                        @else
                            <span  class="bg-primary/80 cursor-not-allowed  py-1 px-3  rounded-md text-white">التالي</span>
                        @endif
                    </div>
                </div>

                <div class="flex justify-center mt-4">

                    @else
                        <div class="w-full my-10 mx-auto text-center">
                            <p class="text-secondary">لا توجد دورات، يرجى المحاولة مرة أخرى</p>
                        </div>
                    @endif
                </div>
        </div>
</div>

