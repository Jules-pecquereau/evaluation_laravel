<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($network) ? __('Edit Network') : __('Create Network') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($network) ? route('networks.update', $network) : route('networks.store') }}" method="POST">
                        @csrf
                        @if(isset($network))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="label" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Label:') }}</label>
                            <input type="text" name="label" id="label" value="{{ old('label', $network->label ?? '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('label') <p class="text-red-400 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="lan" class="block text-gray-700 text-sm font-bold mb-2">{{ __('LAN:') }}</label>
                            <input type="text" name="lan" id="lan" value="{{ old('lan', $network->lan ?? '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('lan') <p class="text-red-400 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_out_of_service" class="form-checkbox border-gray-300 text-blue-600" value="1" {{ old('is_out_of_service', $network->is_out_of_service ?? false) ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">{{ __('Out of Service') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ isset($network) ? __('Update') : __('Create') }}
                            </button>
                            <a href="{{ route('networks.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
