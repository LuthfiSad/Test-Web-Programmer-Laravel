<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Student Extracurricular') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('std_with_extras.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="id_std" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Student</label>
                                <select name="id_std" id="id_std" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    <option value="">-- Select Student --</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('id_std')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="id_extras" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Extracurricular</label>
                                <select name="id_extras" id="id_extras" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    <option value="">-- Select Extracurricular --</option>
                                    @foreach ($extracurriculars as $extracurricular)
                                        <option value="{{ $extracurricular->id }}">{{ $extracurricular->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_extras')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-semibold py-2 px-4 rounded">
                                Add
                            </button>
                            <a href="{{ route('std_with_extras.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-sm text-white font-semibold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
