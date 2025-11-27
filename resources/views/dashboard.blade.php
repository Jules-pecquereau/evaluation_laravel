<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">{{ __("Welcome!") }} {{ Auth::user()->name }}</h3>
                    <p class="mb-6">{{ __("You're logged in!") }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @can('manage-networks')
                        <a href="{{ route('networks.index') }}" class="block p-6 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md text-center">
                            <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                            <h4 class="text-xl font-semibold">{{ __('Networks') }}</h4>
                            <p class="text-sm mt-2">{{ __('Manage network configurations') }}</p>
                        </a>
                        @endcan

                        @can('manage-computers')
                        <a href="{{ route('computers.index') }}" class="block p-6 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow-md text-center">
                            <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <h4 class="text-xl font-semibold">{{ __('Computers') }}</h4>
                            <p class="text-sm mt-2">{{ __('Manage computer inventory') }}</p>
                        </a>
                        @endcan

                        @can('manage-servers')
                        <a href="{{ route('servers.index') }}" class="block p-6 bg-purple-500 hover:bg-purple-600 text-white rounded-lg shadow-md text-center">
                            <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                            <h4 class="text-xl font-semibold">{{ __('Servers') }}</h4>
                            <p class="text-sm mt-2">{{ __('Manage server infrastructure') }}</p>
                        </a>
                        @endcan
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-bold mb-4">{{ __("Network Status") }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($networks as $network)
                                <div class="p-4 rounded-lg shadow-md border {{ $network->is_out_of_service ? 'bg-red-100 border-red-400 text-red-800' : 'bg-green-100 border-green-400 text-green-800' }}">
                                    <div class="flex justify-between items-center mb-2">
                                        <h4 class="text-xl font-semibold">{{ $network->label }}</h4>
                                        <span class="px-2 py-1 rounded text-xs font-bold {{ $network->is_out_of_service ? 'bg-red-200 text-red-900' : 'bg-green-200 text-green-900' }}">
                                            {{ $network->is_out_of_service ? __('Not Available') : __('Available') }}
                                        </span>
                                    </div>
                                    <div class="text-sm">
                                        <p><strong>{{ __('Computers:') }}</strong> {{ $network->computers_count }}</p>
                                        <p><strong>{{ __('Servers:') }}</strong> {{ $network->servers_count }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
