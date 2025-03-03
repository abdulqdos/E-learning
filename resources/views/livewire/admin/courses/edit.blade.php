<div class="flex items-center justify-center min-h-screen ">
    <div class="w-full max-w-lg bg-white border border-gray-200 rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">إنشاء دورة</h1>
        </div>


        <!-- Avatar Upload -->
        <div class="mb-6">
            <label for="img" class="block text-md font-semibold text-gray-700 text-end px-2 mb-1">
                : صورة الكورس
            </label>
            <div class="flex items-center gap-4 flex-col">

                <div>
                    @if($img)
                        <img class="w-32 h-32 object-cover rounded-full shadow-md border border-gray-300" src="{{ $img->temporaryUrl() }}" />
                    @elseif($img_url)
                        <img class="w-32 h-32 object-cover rounded-full shadow-md border border-gray-300" src="{{\Illuminate\Support\Facades\Storage::url($img_url) }}" />
                    @else
                        <div class="w-32 h-32 flex items-center justify-center bg-gray-50 text-gray-400 text-sm border border-gray-300 rounded-full">
                            لا توجد صورة
                        </div>
                    @endif
                </div>
                <label for="img" class="cursor-pointer flex items-center justify-center w-10 h-10 bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-lg shadow-md transition duration-300">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <input type="file" id="img" wire:model="img" class="hidden">
                </label>
            </div>
            @error('img')
            <x-layouts.error :message="$message" />
            @enderror
        </div>



        <form wire:submit.prevent="update" class="space-y-4">


            <!-- اسم الدورة -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: إسم الدورة</label>
                <input type="text" id="title" wire:model.defer="title"
                       class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                       required placeholder="أدخل اسم الدورة">
                @error('title') <x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- الوصف -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: وصف الدورة</label>
                <textarea id="description" wire:model.defer="description"
                          class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                                 focus:border-primary focus:ring-2 focus:ring-primary transition"
                          required placeholder="أدخل وصف الدورة"></textarea>
                @error('description')<x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- القسم -->
            <div>
                <label for="category" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: القسم</label>
                <select id="category" wire:model.defer="category"
                        class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                               focus:border-primary focus:ring-2 focus:ring-primary transition">
                    <option value="">اختر القسم</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')<x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- المحاضر -->
            <div>
                <label for="instructor" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: المحاضر</label>
                <select id="instructor" wire:model.defer="instructor"
                        class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                               focus:border-primary focus:ring-2 focus:ring-primary transition">
                    <option value="">اختر المحاضر</option>
                    @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                    @endforeach
                </select>
                @error('instructor') <x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- المستوى -->
            <div>
                <label for="level" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: المستوى</label>
                <select id="level" wire:model="level"
                        class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                               focus:border-primary focus:ring-2 focus:ring-primary transition">
                    <option value="beginner">مبتدئ</option>
                    <option value="intermediate">متوسط</option>
                    <option value="advanced">متقدم</option>
                </select>
                @error('level')<x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- الحالة -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: الحالة</label>
                <select id="status" wire:model.defer="status"
                        class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                               focus:border-primary focus:ring-2 focus:ring-primary transition">
                    <option value="ongoing">جارية</option>
                    <option value="not_started">لم تبدأ بعد</option>
                    <option value="completed">مكتملة</option>
                </select>
                @error('status')<x-layouts.error :message="$message"/> @enderror
            </div>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('admin.courses') }}" wire:navigate class="py-2 px-4 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    عودة
                </a>
                <button type="submit"
                        class="py-2 px-4 bg-primary hover:bg-primary/80 text-white font-semibold rounded-lg transition">
                    إنشاء
                </button>
            </div>

        </form>
    </div>
</div>
