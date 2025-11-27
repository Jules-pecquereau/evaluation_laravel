<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Computer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>{{ __('Serial Number') }}:</strong> {{ $computer->serial_number }}</p>
                    <p><strong>{{ __('Model') }}:</strong> {{ $computer->model }}</p>
                    <p><strong>{{ __('Brand') }}:</strong> {{ $computer->brand }}</p>
                    <p><strong>{{ __('Commissioned At') }}:</strong> {{ $computer->commissioned_at->format('d/m/Y') }}</p>
                    <p><strong>{{ __('Network') }}:</strong> {{ $computer->network->label }}</p>
                    <a href="{{ route('computers.index') }}" class="text-blue-500 hover:underline">{{ __('Back to List') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
