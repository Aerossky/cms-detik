<x-layout-admin title="User Detail">
    <x-section>
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl">Detail User: {{ $user->name }}</h1>
            <a href="{{ route('user.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
        </div>

        <!-- User Info -->
        <div class="mt-4">
            <h2 class="text-lg font-semibold">Informasi User</h2>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        </div>

        <!-- Topics Table -->
        <div class="mt-8">
            <h2 class="text-lg font-semibold">Topik yang Dibuat oleh {{ $user->name }}</h2>

            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Judul Topik
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Dibuat
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($user->topics as $topic)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $topic->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ Str::limit($topic->description, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $topic->created_at->format('d M Y') }}
                            </td>

                            {{-- detail --}}
                            <td>
                                <a href="{{ route('topic.show', $topic->slug) }}">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada topik yang dibuat oleh user ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-section>
</x-layout-admin>
