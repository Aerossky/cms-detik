<x-layout-admin title="Dashboard">
    <x-section>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8 mt-4">
            <!-- Total Topics -->
            <a href="/topics"
                class="h-32 rounded-lg bg-blue-500 text-white flex items-center justify-center shadow-md hover:bg-blue-600 transition duration-200">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Total Topics</h2>
                    <p class="text-4xl mt-2">{{ $totalTopics }}</p>
                </div>
            </a>

            <!-- Total Users -->
            <a href="/users"
                class="h-32 rounded-lg bg-purple-500 text-white flex items-center justify-center shadow-md hover:bg-purple-600 transition duration-200">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Total Users</h2>
                    <p class="text-4xl mt-2">{{ $totalUsers }}</p>
                </div>
            </a>

            <!-- Total Requests -->
            <a href="/requests"
                class="h-32 rounded-lg bg-green-500 text-white flex items-center justify-center shadow-md hover:bg-green-600 transition duration-200">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Total Requests</h2>
                    <p class="text-4xl mt-2">85</p>
                </div>
            </a>
        </div>


    </x-section>
</x-layout-admin>
