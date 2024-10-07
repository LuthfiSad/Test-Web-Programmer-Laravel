<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students with Extracurriculars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('std_with_extras.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Add New
                    </a>

                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300">Student</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300">Extracurricular</th>
                                {{-- <th class="px-6 py-3 border-b-2 border-gray-300">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stdWithExtras as $stdWithExtra)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300">
                                        {{ $stdWithExtra->student->first_name }} {{ $stdWithExtra->student->last_name }}
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-300">
                                        {{ $stdWithExtra->extracurricular->name }}
                                    </td>
                                    {{-- <td class="px-6 py-4 border-b border-gray-300">
                                        <!-- Tambahkan aksi show dan delete jika diperlukan -->
                                        <a href="{{ route('std_with_extras.show', $stdWithExtra->id) }}"
                                            class="text-blue-600 hover:underline">View</a>
                                        |
                                        <form action="{{ route('std_with_extras.destroy', $stdWithExtra->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($stdWithExtras->isEmpty())
                        <p class="mt-4">No records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
