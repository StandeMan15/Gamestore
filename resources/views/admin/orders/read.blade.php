<x-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs uppercase bg-gray-600">
                <tr class="text-white">
                    <th scope="col" class="px-6 py-3">
                        Producten
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prijs
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aantal
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
</x-layout>