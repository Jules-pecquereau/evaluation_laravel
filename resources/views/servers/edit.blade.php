<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Server') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('servers.update', $server) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="ip_address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('IP Address:') }}</label>
                            <input type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', $server->ip_address) }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('ip_address') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Type:') }}</label>
                            <input type="text" name="type" id="type" value="{{ old('type', $server->type) }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('type') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="os" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OS:') }}</label>
                            <input type="text" name="os" id="os" value="{{ old('os', $server->os) }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('os') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="network_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Network:') }}</label>
                            <select name="network_id" id="network_id" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach($networks as $network)
                                    <option value="{{ $network->id }}" {{ old('network_id', $server->network_id) == $network->id ? 'selected' : '' }}>{{ $network->label }}</option>
                                @endforeach
                            </select>
                            @error('network_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Update') }}
                            </button>
                            <a href="{{ route('servers.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
