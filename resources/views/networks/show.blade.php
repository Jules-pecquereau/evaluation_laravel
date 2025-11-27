<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Network Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>{{ __('Label') }}:</strong> {{ $network->label }}</p>
                    <p><strong>{{ __('LAN') }}:</strong> {{ $network->lan }}</p>
                    <p><strong>{{ __('Status') }}:</strong> {{ $network->is_out_of_service ? __('Out of Service') : __('Active') }}</p>
                    <a href="{{ route('networks.index') }}" class="text-blue-500 hover:underline">{{ __('Back to List') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
