<div class=" flex h-screen">
  <div class="bg-gray-900 text-white w-64 flex-shrink-0">
    <div class="p-4">
      <h1 class="text-2xl font-bold">
          <a href="/">
            <img src="/images/logo.svg" alt="Artitex Logo" width="165" height="16" class="filter brightness-200">
          </a>
      </h1>
    </div>
    <nav class="p-2">
      <ul>
        <li>
          <a class="block py-2 px-4 text-sm font-semibold hover:bg-gray-800 text-white" href="/admin">
          {{ __('messages.admin.nav.products') }}
          </a>
        </li>
        <li>
          <a class="block py-2 px-4 text-sm font-semibold hover:bg-gray-800 text-white" href="{{route('showAdminCategories')}}">
            {{ __('messages.admin.nav.category') }}
          </a>
        </li>
        <li>
          <a class="block py-2 px-4 text-sm font-semibold hover:bg-gray-800 text-white" href="{{route('showOrdersAdmin')}}">
          {{ __('messages.admin.nav.orders') }}
          </a>
        </li>
        <li>
            <a class="block py-2 px-4 text-sm font-semibold hover:bg-gray-800 text-white" href="{{route('showStatusCodes')}}">{{ __('messages.admin.nav.status') }}</a>
        </li>
        <li>
          <form method="POST" action="/logout">
            @csrf

            <button type="submit" class="text-white-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2"><i class="fas fa-sign-out-alt"></i>{{ __('messages.nav.logout') }}</button>
          </form>
        </li>
         <!-- <li>
            <a class="block py-2 px-4 text-sm font-semibold hover:bg-gray-800 text-white" href="{{route('showUsers')}}">{{ __('messages.admin.nav.users') }}</a>
        </li> -->
      </ul>
    </nav>
  </div>
</div>