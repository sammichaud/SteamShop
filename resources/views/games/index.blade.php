<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <table>
                        @foreach($games as $game)
                            <tr>
                                <td>
                                    <img src="{{ url($game->imagePath) }}">
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->name }}"/>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->price }}"/>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->description }}"/>
                                </td>
                                <td>
                                    <x-input-label for="name" value="{{ $game->releaseDate }}"/>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
