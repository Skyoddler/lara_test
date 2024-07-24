<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Prediction') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('predictions.store') }}">
            @csrf

            <div>
                <x-input-label for="new_prediction" :value="__('New prediction')"/>
                <x-text-input id="new_prediction" class="block mt-1 w-full" type="text" name="new_prediction"/>
                <x-input-error :messages="$errors->get('new_prediction')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Add Prediction') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>
