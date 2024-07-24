<x-guest-layout>
    @if (@isset($prediction))
        <x-input-label value="{{ $prediction }}"/>
    @endif


    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
           href="{{ route('login') }}">
            {{ __('Log in') }}
        </a>

        <form method="GET" action="{{ route('predictions.guest') }}">
            @csrf

            <x-primary-button class="ml-3">
                {{ __('Get Prediction') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
