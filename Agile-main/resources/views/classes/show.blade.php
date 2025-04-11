<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $class->title }}</h2>
            <a href="{{ route('classes.index') }}" class="text-blue-500 hover:text-blue-700">
                ← Back to Classes
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Class Details</h3>
                    <p class="text-gray-600 mb-4">{{ $class->description }}</p>
                    <p class="text-sm text-gray-500">Teacher: {{ $class->teacher->name }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Enrolled Students</h3>
                        @if($availableStudents->isNotEmpty())
                            <button onclick="document.getElementById('addStudentModal').classList.remove('hidden')"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Add Student
                            </button>
                        @endif
                    </div>

                    @if($class->students->isEmpty())
                        <p class="text-gray-600 text-center">No students enrolled yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($class->students as $student)
                                <div class="border rounded-lg p-4 flex justify-between items-center">
                                    <span>{{ $student->name }}</span>
                                    <form method="POST" action="{{ route('classes.remove-student', [$class, $student]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Add Student to Class</h3>
                <form method="POST" action="{{ route('classes.add-student', $class) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="student_id" class="block text-sm font-medium text-gray-700">Select Student</label>
                        <select name="student_id" id="student_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($availableStudents as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button"
                            onclick="document.getElementById('addStudentModal').classList.add('hidden')"
                            class="text-gray-600 hover:text-gray-900">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>