<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Classes</h2>
            <a href="{{ route('classes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Class
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($classes->isEmpty())
                        <p class="text-gray-600 text-center">No classes available.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($classes as $class)
                                <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold mb-2">{{ $class->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $class->description }}</p>
                                    <div class="flex justify-between items-center text-sm text-gray-500">
                                        <span>Teacher: {{ $class->teacher->name }}</span>
                                        <span>Students: {{ $class->students->count() }}</span>
                                    </div>
                                    <a href="{{ route('classes.show', $class) }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">
                                        View Details →
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>