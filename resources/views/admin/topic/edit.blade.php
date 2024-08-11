<x-layout-admin title="Topic">
    <x-section>
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl">Halaman Edit Topic</h1>
            <a href="{{ route('topic.index') }}" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
        </div>

        <div class="mt-4">
            <form action="{{ route('topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data"
                class="mx-auto">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title Input -->
                    <div class="mb-5">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $topic->title) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter title" required />
                    </div>

                    <!-- Division Input -->
                    <div class="mb-5">
                        <label for="division"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division</label>
                        <select id="division" name="division"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="marketing"
                                {{ old('division', $topic->division) == 'marketing' ? 'selected' : '' }}>Marketing
                            </option>
                            <option value="it" {{ old('division', $topic->division) == 'it' ? 'selected' : '' }}>IT
                            </option>
                            <option value="human capital"
                                {{ old('division', $topic->division) == 'human capital' ? 'selected' : '' }}>Human
                                Capital</option>
                            <option value="product"
                                {{ old('division', $topic->division) == 'product' ? 'selected' : '' }}>Product</option>
                            <option value="redaksi"
                                {{ old('division', $topic->division) == 'redaksi' ? 'selected' : '' }}>Redaksi</option>
                        </select>
                    </div>
                </div>

                <!-- Description Input -->
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter description" required>{{ old('description', $topic->description) }}</textarea>
                </div>

                <!-- Image Input -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload
                        New Image (optional)</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="image" name="image" type="file">

                    <!-- Display current image if exists -->
                    @if ($topic->image)
                        <img src="{{ asset('storage/topics/' . $topic->image) }}" alt="Current Image"
                            class="mt-2 w-32 h-32 object-cover">
                    @endif
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </x-section>
</x-layout-admin>
