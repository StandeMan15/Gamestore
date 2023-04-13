<x-header />

<x-layout>

  <body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 w-full">
      <h1 class="text-2xl font-semibold mb-6">Bewerk jouw gegevens</h1>
      <form action="{{ route('updateuser', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- edit the name of the user -->
        <div class="grid grid-cols-3 gap-4 mb-4">
          <div>
            <label for="first_name" class="block text-gray-700 font-semibold mb-2">Voornaam</label>
            <x-user-edit type="text" name="first_name" id="first_name" value="{{ auth()->user()->fname }}" />
          </div>
          <div>
            <label for="middle_name" class="block text-gray-700 font-semibold mb-2">Tussenvoegsel</label>
            <x-user-edit type="text" name="middle_name" id="middle_name" value="{{ auth()->user()->addition }}" />
          </div>
          <div>
            <label for="last_name" class="block text-gray-700 font-semibold mb-2">Achternaam</label>
            <x-user-edit type="text" name="last_name" id="last_name" value="{{ auth()->user()->lname }}" />
          </div>
        </div>

        <!-- edit the address of the user -->
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label for="streetname" class="block text-gray-700 font-semibold mb-2">Straat</label>
            <x-user-edit type="text" name="streetname" id="streetname" value="{{ auth()->user()->streetname }}" />
          </div>
          <div>
            <label for="housenmr" class="block text-gray-700 font-semibold mb-2">Huisnummer</label>
            <x-user-edit type="text" name="housenmr" id="housenmr" value="{{ auth()->user()->housenmr }}" />
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <x-user-edit type="text" name="email" id="email" value="{{ auth()->user()->email }}" />
          </div>
          <div>
            <label for="postalcode" class="block text-gray-700 font-semibold mb-2">Postcode</label>
            <x-user-edit type="text" name="postalcode" id="postalcode" value="{{ auth()->user()->postalcode }}" />
          </div>
        </div>



        <div class="mt-6">
          <button type="submit" class="w-full py-2 px-4 text-white font-semibold bg-blue-500 hover:bg-blue-600 rounded focus:outline-none">Update
            Profile</button>
        </div>
      </form>
    </div>
  </body>
</x-layout>