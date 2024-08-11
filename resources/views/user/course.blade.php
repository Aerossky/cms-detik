<x-layout title="Course">
    {{-- Status Message --}}
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg max-w-screen-xl mx-auto" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- search --}}
    <section class="p-4">
        <div class="max-w-screen-xl mx-auto flex flex-wrap items-center gap-4">
            <!-- Form -->
            <form action="{{ url('/search') }}" method="GET" class="w-full flex flex-wrap items-center gap-4">
                <!-- Kategori Filter -->
                <div class="flex-1 min-w-[200px]">
                    <select id="category" name="category"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">Pilih Kategori</option>
                        <option value="marketing" {{ request('category') == 'marketing' ? 'selected' : '' }}>Marketing
                        </option>
                        <option value="it" {{ request('category') == 'it' ? 'selected' : '' }}>IT</option>
                        <option value="human-capital" {{ request('category') == 'human-capital' ? 'selected' : '' }}>
                            Human Capital</option>
                        <option value="product" {{ request('category') == 'product' ? 'selected' : '' }}>Product
                        </option>
                        <option value="redaksi" {{ request('category') == 'redaksi' ? 'selected' : '' }}>Redaksi
                        </option>
                    </select>
                </div>

                <!-- Pencarian Filter -->
                <div class="flex-1 min-w-[200px] flex">
                    <label for="search" class="sr-only">Pencarian</label>
                    <input type="text" id="search" name="search" placeholder="Cari kursus..."
                        class="block w-full rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        value="{{ request('search') }}">
                    <button type="submit"
                        class="ml-2 inline-flex items-center px-4 py-2 rounded-r-md border border-transparent bg-indigo-600 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- card --}}
    <section class="p-4">
        <div class="max-w-screen-xl mx-auto grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Check if there are topics -->
            @if ($topics->isEmpty())
                <div class="col-span-full text-center text-gray-500">
                    Data tidak ditemukan
                </div>
            @else
                @foreach ($topics as $data)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Foto -->
                        <img src="{{ asset('storage/topics/' . $data->image) }}" alt="{{ $data->image }}"
                            class="w-full h-40 object-cover">

                        <div class="p-4">
                            <!-- Title -->
                            <h3 class="text-xl font-semibold truncate">{{ $data->title }}</h3>

                            <!-- Description -->
                            <p class="mt-2 text-gray-600 text-sm truncate" title="{{ $data->description }}">
                                {{ $data->description }}</p>

                            <!-- Penerbit dan Kategori -->
                            <div class="mt-4">
                                <!-- Nama Penerbit -->
                                <p class="text-gray-800 text-sm font-medium"> <span
                                        class="text-gray-600">{{ $data->users->username }}</span></p>

                                <!-- Kategori -->
                                <span
                                    class="inline-block px-2 py-1 rounded bg-indigo-100 text-indigo-800 text-xs font-semibold mt-1"
                                    style="text-transform: capitalize">
                                    {{ $data->division }}
                                </span>
                            </div>

                            <!-- Request Button -->
                            <form action="{{ route('course.request', $data->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="mt-4 inline-block px-4 py-2 rounded-md bg-indigo-600 text-white text-center shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Request
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>
