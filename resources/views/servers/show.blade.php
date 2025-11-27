<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Server Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>{{ __('IP Address') }}:</strong> {{ $server->ip_address }}</p>
                    <p><strong>{{ __('Type') }}:</strong> {{ $server->type }}</p>
                    <p><strong>{{ __('OS') }}:</strong> {{ $server->os }}</p>
                    <p><strong>{{ __('Network') }}:</strong> {{ $server->network->label }}</p>
                    <a href="{{ route('servers.index') }}" class="text-blue-500 hover:underline">{{ __('Back to List') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
