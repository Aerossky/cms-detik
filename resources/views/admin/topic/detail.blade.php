<x-layout-admin title="Topic Details">
    <x-section>
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-bold text-xl">Detail Topic</h1>
            <a href="{{ route('topic.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $topic->title }}</h2>

            <div class="mb-4">
                <strong>Division:</strong>
                <p>{{ $topic->division }}</p>
            </div>

            <div class="mb-4">
                <strong>Description:</strong>
                <p>{{ $topic->description }}</p>
            </div>

            @if($topic->image)
                <div class="mb-4">
                    <strong>Image:</strong>
                    <img src="{{ asset('images/' . $topic->image) }}" alt="{{ $topic->title }}" class="w-full max-w-md">
                </div>
            @endif

            <div class="mb-4">
                <strong>Slug:</strong>
                <p>{{ $topic->slug }}</p>
            </div>

            <div class="mb-4">
                <strong>Created By:</strong>
                <p>{{ $topic->created_by }}</p>
            </div>
        </div>
    </x-section>
</x-layout-admin>
