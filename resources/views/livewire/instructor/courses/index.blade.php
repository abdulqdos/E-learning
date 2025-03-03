<div class="flex flex-col gap-y-10">


    <x-layouts.admin.header :a="true" :url="route('instructors.courses.create' , [ 'instructor' => Auth::user()->id ] ) " label="إضافة كورس">
            كورساتي
    </x-layouts.admin.header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- صورة الكورس -->
                <img src="{{ \Illuminate\Support\Facades\Storage::url($course->img_url) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover rounded-lg mb-4">

                <h3 class="text-xl font-semibold mb-2">{{ $course->title }}</h3>

                <!-- وصف الكورس -->
                <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>

                <!-- اسم المحاضر -->
                <p class="text-gray-800 font-semibold mb-4">المحاضر: {{ Auth::user()->name }}</p>

                <!-- الأزرار -->
                <div class="flex flex-row justify-between items-center">
                    <!-- زر تعديل -->
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        تعديل
                    </a>

                    <!-- زر حذف -->
                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                        حذف
                    </button>

                    <!-- زر عرض التفاصيل -->
                    <a href="{{ route('instructors.courses.show' ,
                         [
                            'course' => $course,
                            'instructor' => $instructor,
                        ]
                    ) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 text-sm    ">
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
