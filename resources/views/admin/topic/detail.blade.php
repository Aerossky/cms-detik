<x-layout-admin title="Topic Details">
    <x-section>
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Topic</h1>
            <a href="{{ route('topic.index') }}"
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

                <!-- Slug -->
                <div>
                    <strong class="text-lg text-gray-700">Slug:</strong>
                    <p class="text-gray-600">{{ $topic->slug }}</p>
                </div>

                <!-- Created By -->
                <div>
                    <strong class="text-lg text-gray-700">Created By:</strong>
                    <p class="text-gray-600">{{ $topic->created_by }}</p>
                </div>

                <!-- Description -->
                <div>
                    <strong class="text-lg text-gray-700">Description:</strong>
                    <p class="text-gray-600">{{ $topic->description }}</p>
                </div>
            </div>
        </div>

        <!-- User Request Section -->
        <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">User Requests</h3>

            @if ($topic->requests->isEmpty())
                <p class="text-gray-600">No requests available for this topic.</p>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($topic->requests as $request)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $request->user->username }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $request->status }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    <form action="{{ route('request.updateStatus', $request->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="pending"
                                                {{ $request->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved"
                                                {{ $request->status === 'approved' ? 'selected' : '' }}>Approved
                                            </option>
                                            <option value="rejected"
                                                {{ $request->status === 'rejected' ? 'selected' : '' }}>Rejected
                                            </option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </table>
            @endif
        </div>
    </x-section>
</x-layout-admin>
