<?php $timeNow = Carbon\Carbon::now(); ?>

<x-admin-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-4 m-auto">
            <div class="col-span-6 col-start-4 flex justify-around">
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
            <div class="flex justify-content-end m-2">
                <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
            </div>
        </div>
    </div>
</x-admin-layout>