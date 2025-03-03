<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white border border-gray-200 rounded-xl shadow-lg p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">تسجيل محاضر</h1>
        </div>

        <form wire:submit.prevent="store" class="space-y-4">

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

            <!-- كلمة المرور -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: كلمة المرور</label>
                <input type="password" id="password" wire:model.defer="password"
                       class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                       required placeholder="أدخل كلمة المرور">
                @error('password') <x-layouts.error :message="$message"/> @enderror
            </div>

            <!-- تأكيد كلمة المرور -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 text-end px-2 mb-1">: تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                       class="py-3 px-4 w-full bg-gray-50 border border-gray-300 rounded-lg text-sm
                              focus:border-primary focus:ring-2 focus:ring-primary transition"
                       required placeholder="تأكيد كلمة المرور">
                @error('password_confirmation') <x-layouts.error :message="$message"/> @enderror
            </div>



            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('admin.instructors') }}" wire:navigate class="py-2 px-4 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    عودة
                </a>
                <button type="submit"
                        class="py-2 px-4 bg-primary hover:bg-primary/80 text-white font-semibold rounded-lg transition">
                    تسجيل
                </button>
            </div>

        </form>
    </div>
</div>
