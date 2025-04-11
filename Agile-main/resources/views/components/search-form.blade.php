<form method="GET" action="{{ route('users.search') }}" class="p-4 bg-white rounded-lg shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <x-input-label for="name" value="Student Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ request('name') }}" placeholder="Enter student name" />
        </div>

        <div>
            <x-input-label for="id" value="Student ID" />
            <x-text-input id="id" name="id" type="text" class="mt-1 block w-full" value="{{ request('id') }}" placeholder="Enter student ID" />
        </div>
    </div>

    <div class="mt-4 flex justify-end">
        <x-primary-button>
            Search
        </x-primary-button>
    </div>
</form>