<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center mb-8">
                        <img src="{{ asset($student->image ? 'storage/' . $student->image : 'default.png') }}" alt="{{ $student->first_name }}" class="w-full max-w-md h-auto rounded-lg shadow-lg object-cover mb-6">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $student->first_name }} {{ $student->last_name }}</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $student->number }}</p>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIS</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $student->nis }}</p>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $student->address }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('students.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
