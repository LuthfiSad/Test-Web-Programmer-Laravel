<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Extracurricular') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('extracurriculars.update', $extracurricular->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Extracurricular Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $extracurricular->name) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('name')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="start_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Year</label>
                                <input type="text" name="start_year" id="start_year" value="{{ old('start_year', $extracurricular->start_year) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('start_year')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Update
                            </button>
                            <a href="{{ route('extracurriculars.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-sm text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
