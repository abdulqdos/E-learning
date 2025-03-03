<div class="flex items-center justify-center mx-auto bg-gray-200">
    <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm mx-auto my-4 min-w-96">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800">إنشاء حساب</h1>
                <p class="mt-2 text-sm text-gray-600">
                     لديك حساب ؟
                    <a class="text-lightGold decoration-2 hover:underline focus:outline-none focus:underline font-medium" href="../examples/html/signup.html">
                        سجل الآن
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6">أو</div>

                <form wire:submit="signUp">
                    <div class="grid gap-y-4">
                        <div>
                            <label for="name" class="block text-sm mb-2 text-gray-800">الأسم </label>
                            <div class="relative">
                                <input type="text" id="name" wire:model="name"
                                       class="py-3 px-4 block w-full bg-gray-50 border-gray-200 rounded-lg text-sm
                                            focus:border-gold focus:ring-gold focus:outline focus:outline-2 focus:outline-gold
                                            disabled:opacity-50 disabled:pointer-events-none placeholder-gray-300"
                                       required  placeholder="john Doe">
                            </div>
                            @error('name')
                            <p class="font-semibold italic text-xs text-red-600 mt-2" id="email-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm mb-2 text-gray-800">البريد الإلكتروني</label>
                            <div class="relative">
                                <input type="email" id="email" wire:model="email"
                                       class="py-3 px-4 block w-full bg-gray-50 border-gray-200 rounded-lg text-sm
                                            focus:border-gold focus:ring-gold focus:outline focus:outline-2 focus:outline-gold
                                            disabled:opacity-50 disabled:pointer-events-none placeholder-gray-300"
                                       required aria-describedby="email-error" placeholder="example@email.com">
                            </div>
                            @error('email')
                            <p class="font-semibold italic text-xs text-red-600 mt-2" id="email-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm mb-2 text-gray-800">كلمة المرور</label>
                            </div>

                            <div class="relative">
                                <input type="password" id="password" name="password" wire:model="password"
                                       class="py-3 px-4 block w-full bg-gray-50 border-gray-200 rounded-lg text-sm
                      focus:border-gold focus:ring-gold focus:outline focus:outline-2 focus:outline-gold
                      disabled:opacity-50 disabled:pointer-events-none placeholder-gray-300"
                                       required placeholder="*********">
                            </div>

                            @error('password')
                            <p class="text-xs text-red-600 mt-2 font-semibold italic" id="password-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="flex justify-between items-center">
                                <label for="password_confirmation" class="block text-sm mb-2 text-gray-800">تأكيد كلمة المرور</label>
                            </div>

                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation" wire:model="password_confirmation"
                                       class="py-3 px-4 block w-full bg-gray-50 border-gray-200 rounded-lg text-sm
                      focus:border-gold focus:ring-gold focus:outline focus:outline-2 focus:outline-gold
                      disabled:opacity-50 disabled:pointer-events-none placeholder-gray-300"
                                       required placeholder="*********">
                            </div>

                            @error('password_confirmation')
                            <p class="text-xs text-red-600 mt-2 font-semibold italic" id="password-confirmation-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        <div class="flex items-center">
                            <div class="flex">
                                <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500">
                            </div>
                            <div class="ms-3">
                                <label for="remember-me" class="text-sm text-gray-800">تذكرني</label>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gold text-white hover:bg-lightGold disabled:opacity-50 disabled:pointer-events-none transition duration-300">تسجيل الدخول</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
