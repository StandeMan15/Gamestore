<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>
        <div class="col-start-3" @click.outside="isOpen = false">
            <div class="z-30" x-data="{ isOpen: sessionStorage.getItem('actionsOpened') === 'true' }">
                <button @click="isOpen = !isOpen" id="showcart" class="w-24 py-3.5 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Options
                </button>

                <div x-cloak x-show="isOpen">
                    <div class="col-span-3 col-start-3 z-20">
                        <div class="relative inline-block text-left">
                            <div class="right-0 z-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                <a href="{{route('createProduct')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">{{ __('messages.admin.index.create') }}</a>
                                <a href="{{route('filterActive')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">{{ __('messages.admin.index.active') }}&nbsp;{{ __('messages.admin.product.title') }}</a>
                                <a href="{{route('filterInactive')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">{{ __('messages.admin.index.inactive') }}&nbsp;{{ __('messages.admin.product.title') }}</a>
                                <a href="/admin" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">{{ __('messages.admin.index.all_products') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-6 col-start-4 m-auto">
        <table>
            <th>{{ __('messages.admin.product.title') }}</th>
            <th>{{ __('messages.admin.index.actions') }}</th>
            @foreach ( $products as $product )
            <tr>
                <td>
                    {{ $product->title }}
                </td>

                <td>
                    <a href="{{route('readProduct', $product->id)}}" class="bg-blue-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.read') }}</a>
                </td>
                <td>
                    <a href="{{route('editProduct', $product->id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.edit') }}</a>
                </td>
                <td>
                    <form method="post" action="#">
                        @csrf

                        @if ($product->active == 1)
                        <a href="{{route('statusProduct', $product->id)}}" class="bg-green-400 text-white flex rounded-md px-3" type="submit">
                            {{ __('messages.admin.index.active') }}
                        </a>
                        @else
                        <a href="{{route('statusProduct', $product->id)}}" class="bg-red-400 text-white flex rounded-md px-2" type="submit">
                            {{ __('messages.admin.index.inactive') }}
                        </a>
                        @endif
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
        <div class="top-1/2 right-2/5">
            {{ $products->links() }}
        </div>
    </div>

</x-layout>