<x-layout title="Topic Details">
    <x-section>
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Topic</h1>
            <a href="/my-course"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-700">
                Kembali
            </a>
        </div>

        <!-- Content Section -->
        <div class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            <h2 class="text-3xl font-semibold text-gray-900">{{ $topic->title }}</h2>

            <div class="flex flex-col space-y-4">
                <!-- Division -->
                <div>
                    <strong class="text-lg text-gray-700">Division:</strong>
                    <p class="text-gray-600">{{ $topic->division }}</p>
                </div>

                <!-- Image -->
                @if ($topic->image)
                    <div>
                        <strong class="text-lg text-gray-700">Image:</strong>
                        <img src="{{ asset('storage/topics/' . $topic->image) }}" alt="{{ $topic->title }}"
                            class="w-full mt-2 rounded-lg shadow-sm border border-gray-200 max-w-20">
                    </div>
                @endif

                <!-- Created By -->
                <div>
                    <strong class="text-lg text-gray-700">Created By:</strong>
                    <p class="text-gray-600">{{ $topic->users->username }}</p>
                </div>

                <!-- Description -->
                <div>
                    <strong class="text-lg text-gray-700">Description:</strong>
                    <p class="text-gray-600">{{ $topic->description }}</p>
                </div>
            </div>
        </div>

    </x-section>
</x-layout>
