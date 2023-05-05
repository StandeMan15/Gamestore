<div class="w-52 h-screen bg-blue-500 text-white pl-4 pt-2 mt-3 rounded-r-lg -z-10 absolute">
    <ul>
        <li>
            <a class="text-white" href="{{route('showAdminCategories')}}">{{ __('messages.admin.nav.category') }}</a>
        </li>
        <li>
            <a class="text-white" href="/admin">{{ __('messages.admin.nav.products') }}</a>
        </li>
        <!-- <li>
            <a class="text-white" href="{{route('showUsers')}}">{{ __('messages.admin.nav.users') }}</a>
        </li> -->
        <li>
            <a class="text-white" href="{{route('showOrdersAdmin')}}">{{ __('messages.admin.nav.orders') }}</a>
        </li>
        <li>
            <a class="text-white" href="{{route('showStatusCodes')}}">{{ __('messages.admin.nav.status') }}</a>
        </li>
    </ul>
</div>