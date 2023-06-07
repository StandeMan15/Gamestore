<x-admin-layout>
        <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-4 m-auto">
            <div class="col-span-6 col-start-4 flex justify-around">
                <form method="POST" action="{{route('storeStatus')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-12 gap-4">
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                        @endforeach
                        @endif

                        <div class="col-start-3 col-span-1">
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                                {{ __('messages.admin.status.title') }}
                            </label>
                        </div>

                        <div class="col-span-2">
                            <input class="p-2 border border-gray-200" type="text" name="title" id="title" required>
                        </div>

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="grid grid-cols-12 gap-4">
                        <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">{{ __('messages.form.submit') }}</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-content-end m-2">
                <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
            </div>
        </div>
    </div>

</x-admin-layout>