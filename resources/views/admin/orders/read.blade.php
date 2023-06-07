<x-admin-layout>
    <div class="relative overflow-x-auto">

    </div>
</x-admin-layout>

<x-admin-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-4 m-auto">
            <div class="col-span-6 col-start-4 flex justify-around">
        <table class="m-auto text-sm">
            <thead class="text-xs uppercase bg-gray-600">
                <tr class="text-white">
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.admin.product.title') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.admin.order.price') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.admin.product.qty') }}
                    </th>
                </tr>
                @foreach ($orderdetails as $details)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$details->name}}</th>
                    <td class="px-6 py-4">€{{$details->price}}</td>
                    <td class="px-6 py-4">{{$details->quantity}}</td>
                </tr>
                @endforeach
                <tr class="bg-white border-b">
                    <td></td>
                    <td></td>
                    <td class="px-6 py-4 col-span-1">
                        <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">Go Back</a>
                    </td>
                </tr>
        </table>
            </div>
        </div>
    </div>
</x-admin-layout>