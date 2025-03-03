<div class="bg-white border rounded-xl shadow-sm sm:flex sm:flex-row-reverse text-right p-5">
    <!-- صورة الدورة -->
    <div class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-e-xl sm:max-w-60 md:rounded-es-none md:max-w-xs">
        <img class="size-full absolute top-0 start-0 object-cover" src="{{ \Illuminate\Support\Facades\Storage::url($course->img_url) }}" alt="Course Image">
    </div>

    <!-- تفاصيل الدورة -->
    <div class="flex flex-col flex-grow p-5 sm:p-7 space-y-4">
        <h3 class="text-xl font-bold text-gray-800">
            {{ $course->title }}
        </h3>
        <p class="text-gray-600 leading-relaxed">
            {{ $course->description }}
        </p>

        <!-- معلومات إضافية -->
        <div class="space-y-3 text-gray-700 rtl">
            <p><strong>القسم:</strong> {{ $course->category->name }}</p>
            <p><strong>المحاضر:</strong> {{ $course->instructor->name }}</p>

            <!-- حالة الدورة -->
            <div class="flex items-center justify-end gap-3">
                <span class="border py-1 px-3 font-semibold rounded-md text-sm
                    {{ $course->status === 'ongoing' ? 'border-green-600 text-green-600' :
                        ($course->status === 'not_started' ? 'border-red-600 text-red-600' : 'border-blue-600 text-blue-600') }}">
                    {{ $course->status === 'not_started' ? 'لم يبدأ بعد' : ($course->status === 'ongoing' ? 'مستمر' : 'مكتمل') }}
                </span>
                <strong>:الحالة</strong>
            </div>

            <!-- سعر الدورة -->
            <div class="flex items-center justify-end gap-3">
                <span class="font-semibold text-gray-800 rtl">
                    {{ $course->price ? number_format($course->price) . ' $' : 'مجانًا' }}
                </span>

                <strong> : السعر</strong>
            </div>

            <!-- مستوى الدورة -->
            <div class="flex items-center justify-end gap-3">
                <span class="border py-1 px-3 font-semibold rounded-md text-sm
                    {{ $course->level === 'beginner' ? 'border-green-600 text-green-600' :
                        ($course->level === 'intermediate' ? 'border-blue-600 text-blue-600' : 'border-red-600 text-red-600') }}">
                    {{ $course->level === 'beginner' ? 'مبتدئ' : ($course->level === 'intermediate' ? 'متوسط' : 'متقدم') }}
                </span>
                <strong>: المستوى</strong>
            </div>
        </div>

        <!-- آخر تحديث + زر الرجوع -->
        <div class="mt-5 flex justify-between items-center text-sm text-gray-500">
            <a href="{{ route('admin.courses') }}" class="px-4 py-2 bg-darkGray hover:bg-lightGray transition duration-300 rounded-md text-white">
                عودة
            </a>
            <p class="rtl">آخر تحديث: {{ \Carbon\Carbon::parse($course->updated_at)->locale('ar')->diffForHumans() }}</p>
        </div>
    </div>
</div>
