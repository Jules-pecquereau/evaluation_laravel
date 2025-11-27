<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($computer) ? __('Edit Computer') : __('Create Computer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($computer) ? route('computers.update', $computer) : route('computers.store') }}" method="POST">
                        @csrf
                        @if(isset($computer))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="serial_number" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Serial Number:') }}</label>
                            <input type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', $computer->serial_number ?? '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('serial_number') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Model:') }}</label>
                            <input type="text" name="model" id="model" value="{{ old('model', $computer->model ?? '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('model') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Brand:') }}</label>
                            <input type="text" name="brand" id="brand" value="{{ old('brand', $computer->brand ?? '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('brand') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="commissioned_at" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Commissioned At:') }}</label>
                            <input type="date" name="commissioned_at" id="commissioned_at" value="{{ old('commissioned_at', isset($computer) ? $computer->commissioned_at->format('Y-m-d') : '') }}" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('commissioned_at') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="network_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Network:') }}</label>
                            <select name="network_id" id="network_id" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">{{ __('Select Network') }}</option>
                                @foreach($networks as $network)
                                    <option value="{{ $network->id }}" {{ old('network_id', $computer->network_id ?? '') == $network->id ? 'selected' : '' }}>
                                        {{ $network->label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('network_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ isset($computer) ? __('Update') : __('Create') }}
                            </button>
                            <a href="{{ route('computers.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
