<x-layout title="My Courses">
    <section class="p-4">
        <div class="max-w-screen-xl mx-auto">
            @if ($courses->isEmpty())
                <p class="text-center text-gray-600">Belum ada kursus</p>
            @else
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($courses as $course)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <!-- Foto -->
                            <img src="{{ asset('storage/topics/' . $course->topic->image) }}"
                                alt="{{ $course->topic->title }}" class="w-full h-40 object-cover">

                            <div class="p-4">
                                <!-- Title -->
                                <h3 class="text-xl font-semibold truncate">{{ $course->topic->title }}</h3>

                                <!-- Description -->
                                <p class="mt-2 text-gray-600 text-sm truncate"
                                    title="{{ $course->topic->description }}">
                                    {{ $course->topic->description }}
                                </p>

                                <!-- Penerbit dan Kategori -->
                                <div class="mt-4">
                                    <!-- Nama Penerbit -->
                                    <p class="text-gray-800 text-sm font-medium">
                                        <span class="text-gray-600">{{ $course->user->username }}</span>
                                    </p>

                                    <!-- Kategori -->
                                    <span
                                        class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-semibold mt-1"
                                        style="text-transform: capitalize">
                                        {{ $course->topic->division }}
                                    </span>
                                </div>

                                <!-- Status -->
                                <div class="mt-4">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-green-100 text-green-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                        ];
                                        $statusClass = $statusClasses[$course->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span
                                        class="inline-block px-2 py-1 rounded {{ $statusClass }} text-xs font-semibold">
                                        {{ ucfirst($course->status) }}
                                    </span>
                                </div>

                                <!-- Detail Button -->
                                @if ($course->status == 'approved')
                                    <a href="{{ route('course.show', $course->topic->id) }}"
                                        class="mt-4 inline-block px-4 py-2 rounded-md bg-blue-600 text-white text-center shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Read
                                    </a>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
