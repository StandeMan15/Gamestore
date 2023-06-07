<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">{{ __('messages.nav.register') }}</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="fname">
                        {{ __('messages.form.fname') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="fname" id="fname" value="{{ old('fname') }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="lname">
                        {{ __('messages.form.lname') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="lname" id="lname" value="{{ old('lname') }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        {{ __('messages.user.uname') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{ old('username') }}" required>

                    @error('username')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        {{ __('messages.form.email') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        {{ __('messages.form.psw') }}
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" value="{{ old('password') }}" required>
                    <li> Your password must be more than 6 characters long</li>
                    <li>should contain at-least 1 Uppercase and Lowercase</li>
                    <li>1 Numeric and 1 special character.</li>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        {{ __('messages.form.submit') }}
                    </button>
                </div>


                <!-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif -->
            </form>
            <div class="mb-6">
                <a href="/login">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        {{ __('messages.nav.login') }}
                    </button>
                </a>
            </div>
        </main>
    </section>
</x-layout>