<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main Page') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if (@isset($prediction))
                <x-input-label value="{{ $prediction }}"/>
            @endif

            <div class="flex items-center justify-end mt-4">

                <form method="GET" action="{{ route('predictions.create') }}">
                    @csrf

                    <x-primary-button class="ml-3">
                        {{ __('Add Prediction') }}
                    </x-primary-button>
                </form>

                <form method="GET" action="{{ route('predictions.index') }}">
                    @csrf

                    <x-primary-button class="ml-3">
                        {{ __('Get Prediction') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
