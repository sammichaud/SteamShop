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
                    <form method="post" action="{{ route('games.store') }}" class="mt-12 space-y-12">
                        @csrf
                        @method('POST')

                        <div>
                            <x-input-label for="name" value="{{ __('Name') }}"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Price') }}"/>
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" step=".01" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('price')"/>
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Description') }}"/>
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        </div>

                        <div>
                            <x-input-label for="email" value="{{ __('Release date') }}"/>
                            <x-text-input id="releaseDate" name="releaseDate" type="datetime-local" class="mt-1 block w-full datetimepicker" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('releaseDate')"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
