@php
//$user = auth()->user();
@endphp
<x-header />

<x-layout>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <body class="bg-gray-200">
    <div class="max-w-md mx-auto mt-10 w-full">
      <h1 class="text-2xl font-semibold mb-6">{{ __('messages.user.change') }}</h1>
      <form action="{{ route('updateuser', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- edit the name of the user -->
        <div class="grid grid-cols-3 gap-4 mb-4">
          <div>
            <label for="fname" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.fname') }}</label>
            <x-user-edit type="text" name="fname" id="fname" value="{{ auth()->user()->fname }}" />
          </div>
          <div>
            <label for="mname" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.additation') }}</label>
            <x-user-edit type="text" name="mname" id="mname" value="{{ auth()->user()->addition }}" />
          </div>
          <div>
            <label for="lname" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.lname') }}</label>
            <x-user-edit type="text" name="lname" id="lname" value="{{ auth()->user()->lname }}" />
          </div>
        </div>

        <!-- edit the address of the user -->
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label for="housenmr" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.housenmr') }}</label>
            <x-user-edit type="text" name="housenmr" id="housenmr" value="{{ auth()->user()->housenmr }}" />
          </div>
          <div>
            <label for="housenmr_extra" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.housenmr_ex') }}</label>
            <x-user-edit type="text" name="housenmr_extra" id="housenmr_extra" value="{{ auth()->user()->housenmr_extra }}" />
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label for="postalcode" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.postalcode') }}</label>
            <x-user-edit type="text" name="postalcode" id="postalcode" value="{{ auth()->user()->postalcode }}" />
          </div>
          <div>
            <label for="streetname" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.streetname') }}</label>
            <x-user-edit type="text" name="streetname" id="streetname" value="{{ auth()->user()->streetname }}" />
          </div>
        </div>

        <div class="grid grid-cols-1 gap-4 mb-4">
          <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">{{ __('messages.form.email') }}</label>
            <x-user-edit type="text" name="email" id="email" value="{{ auth()->user()->email }}" />
          </div>

        </div>



        <div class="mt-6">
          <button type="submit" class="w-full py-2 px-4 text-white font-semibold bg-blue-500 hover:bg-blue-600 rounded focus:outline-none">
            {{ __('messages.user.edit_btn') }}</button>
        </div>
      </form>
    </div>
  </body>
</x-layout>