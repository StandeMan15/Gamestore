<x-admin-layout>
        <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-4 m-auto">
            
                <form method="POST" action="{{route('storeCategory')}}" enctype="multipart/form-data">
                    <div class="col-span-6 col-start-4 flex justify-around">
                        @csrf

                        <div class="grid grid-cols-12">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                            @endforeach
                            @endif

                            <div class="col-start-4 col-span-3">
                                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                                    {{ __('messages.admin.category.title') }}
                                </label>
                            </div>

                            <div class="col-span-2">
                                <input class="p-2 border border-gray-200" type="text" name="name" id="name" required>
                            </div>

                            @error('name')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div> 
                    <div class="flex justify-content-end m-2">
                        <button class="flex justify-content-around bg-green-500 text-white rounded-xl p-2" type="submit">{{ __('messages.form.submit') }}</button>        
                    </div>
                    
                </form>
           
            <div class="flex justify-content-end m-2">
                <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
            </div>
        </div>
    </div>

</x-admin-layout>