<?php $timeNow = Carbon\Carbon::now(); ?>

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-start-6 col-span-4 my-8">
            <table>
                <tr>
                    <td>
                        {{ __('messages.admin.category.title') }}:
                    </td>

                    <td>
                        {{ $categorie->name}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ __('messages.admin.category.slug') }}:
                    </td>

                    <td>
                        {{ $categorie->slug }}
                    </td>
                </tr>
            </table>

        </div>
    </div>

    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-5"></div>
        <div class="col-span-1">
            <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
        </div>
    </div>



</x-layout>