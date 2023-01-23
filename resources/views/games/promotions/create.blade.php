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
                    <form method="post" action="{{ route('games.promotions.store', $game) }}" class="mt-12 space-y-12" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div>
                            <x-input-label for="price" value="{{ __('Price') }}"/>
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" step=".01" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('price')"/>
                        </div>

                        <div>
                            <x-input-label for="start_date" value="{{ __('Start date') }}"/>
                            <x-text-input id="start_date" name="start_date" type="datetime-local" class="mt-1 block w-full datetimepicker" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('start_date')"/>
                        </div>

                        <div>
                            <x-input-label for="end_date" value="{{ __('Release date') }}"/>
                            <x-text-input id="end_date" name="end_date" type="datetime-local" class="mt-1 block w-full datetimepicker" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')"/>
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
