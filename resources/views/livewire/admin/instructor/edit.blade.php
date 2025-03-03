<div class="flex items-center justify-center min-h-screen" rtl>
    <div class="w-full max-w-lg bg-white border border-gray-200 rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">تحديث بيانات المحاضر</h1>
        </div>

        <form wire:submit.prevent="update" class="space-y-4">

            <!-- اسم المحاضر -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: اسم المحاضر</label>
                <input type="text" id="name" wire:model.defer="name"
                       class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                       required placeholder="أدخل اسم المحاضر">
                @error('name') <x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- البريد الإلكتروني -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: البريد الإلكتروني</label>
                <input type="email" id="email" wire:model.defer="email"
                       class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                       required placeholder="أدخل البريد الإلكتروني">
                @error('email') <x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- تغيير كلمة المرور -->
            <div>
                <label class="flex items-center cursor-pointer justify-end">
                    <input type="checkbox" wire:model.boolean.live="change_password" class="form-checkbox text-primary h-4 w-4">
                    <span class="ml-2 text-sm text-gray-700">تغيير كلمة المرور</span>
                </label>
            </div>

            @if($change_password)
                <!-- كلمة المرور القديمة -->
                <div>
                    <label for="old_password" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: كلمة المرور القديمة</label>
                    <input type="password" id="old_password" wire:model.defer="old_password"
                           class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                           placeholder="أدخل كلمة المرور القديمة">
                    @error('old_password') <x-layouts.error :message="$message"/> @enderror
                </div>

                <!-- كلمة المرور الجديدة -->
                <div>
                    <label for="new_password" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: كلمة المرور الجديدة</label>
                    <input type="password" id="new_password" wire:model.defer="new_password"
                           class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                           placeholder="أدخل كلمة المرور الجديدة">
                    @error('new_password') <x-layouts.error :message="$message"/> @enderror
                </div>

                <!-- تأكيد كلمة المرور الجديدة -->
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: تأكيد كلمة المرور الجديدة</label>
                    <input type="password" id="new_password_confirmation" wire:model.defer="new_password_confirmation"
                           class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                           placeholder="تأكيد كلمة المرور الجديدة">
                    @error('new_password_confirmation') <x-layouts.error :message="$message"/> @enderror
                </div>
            @endif

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('admin.instructors') }}" wire:navigate class="py-2 px-4 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    عودة
                </a>
                <button type="submit"
                        class="py-2 px-4 bg-primary hover:bg-primary/80 text-white font-semibold rounded-lg transition">
                    تحديث البيانات
                </button>
            </div>

        </form>
    </div>
</div>
