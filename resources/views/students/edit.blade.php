<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $student->first_name) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('first_name')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $student->last_name) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('last_name')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number</label>
                                <input type="tel" name="number" id="number" value="{{ old('number', $student->number) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('number')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIS</label>
                                <input type="text" name="nis" id="nis" value="{{ old('nis', $student->nis) }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('nis')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                <textarea rows="5" name="address" id="address"
                                    class="mt-1 block p-2 w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ old('address', $student->address) }}</textarea>
                                @error('address')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full shadow-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 p-2"
                                    onchange="previewImage(event)">
                                <img id="preview-image" class="mt-4 w-48 max-h-48 rounded object-cover"
                                    src="{{ asset($student->image ? 'storage/' . $student->image : 'default.png') }}" alt="Image Preview">
                                @error('image')
                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Update
                            </button>
                            <a href="{{ route('students.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-sm text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
</x-app-layout>
