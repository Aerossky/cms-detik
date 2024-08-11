<x-layout title="Home">
    <section class="bg-gray-50">
        {{-- HERO --}}
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Tingkatkan Kemampuanmu,
                    <strong class="font-extrabold text-blue-700 sm:block"> Tingkatkan Karirmu! </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Bergabunglah dengan detikcom dan akses materi pembelajaran kapan saja dan di mana saja. Pelajari
                    keterampilan baru dan dorong kesuksesan karirmu dengan fleksibilitas yang tak tertandingi!
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
                        href="/register">
                        Mulai Sekarang
                    </a>

                    <a class="block w-full rounded px-12 py-3 text-sm font-medium text-blue-600 shadow hover:text-blue-700 focus:outline-none focus:ring active:text-blue-500 sm:w-auto"
                        href="/register">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
        {{-- HERO END --}}
    </section>
    <section>
        <div class="max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16 mx-auto">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-16">
                <div class="mx-auto max-w-lg text-center lg:mx-0 lg:text-left">
                    <h2 class="text-3xl font-bold sm:text-4xl">Temukan Jalur Karier Anda</h2>
                    <p class="mt-4 text-gray-600">
                        Temukan berbagai peluang karier yang sesuai dengan keahlian dan minat Anda. Bergabunglah dengan
                        kami untuk memperluas pengetahuan dan meningkatkan keterampilan Anda.
                    </p>
                    <a href="/register"
                        class="mt-8 inline-block rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring focus:ring-yellow-400">
                        Mulai Sekarang
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <!-- Marketing -->
                    <a href="{{ url('/course?category=marketing') }}"
                        class="block rounded-xl border border-blue-300 bg-blue-100 p-4 shadow-sm hover:border-blue-400 hover:ring-1 hover:ring-blue-400 focus:outline-none focus:ring">
                        <span class="inline-block rounded-lg bg-blue-50 p-3">
                            <!-- SVG for Marketing icon -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Replace with appropriate SVG path for Marketing -->
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold text-blue-800">Marketing</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Peluang dan karier di bidang pemasaran.
                        </p>
                    </a>

                    <!-- IT -->
                    <a href="{{ url('/course?category=it') }}"
                        class="block rounded-xl border border-blue-300 bg-blue-100 p-4 shadow-sm hover:border-blue-400 hover:ring-1 hover:ring-blue-400 focus:outline-none focus:ring">
                        <span class="inline-block rounded-lg bg-blue-50 p-3">
                            <!-- SVG for IT icon -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Replace with appropriate SVG path for IT -->
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold text-blue-800">IT</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Peluang dan karier di bidang teknologi informasi.
                        </p>
                    </a>

                    <!-- Human Capital -->
                    <a href="{{ url('/course?category=human-capital') }}"
                        class="block rounded-xl border border-blue-300 bg-blue-100 p-4 shadow-sm hover:border-blue-400 hover:ring-1 hover:ring-blue-400 focus:outline-none focus:ring">
                        <span class="inline-block rounded-lg bg-blue-50 p-3">
                            <!-- SVG for Human Capital icon -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Replace with appropriate SVG path for Human Capital -->
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold text-blue-800">Human Capital</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Peluang dan karier di bidang pengelolaan sumber daya manusia.
                        </p>
                    </a>

                    <!-- Product -->
                    <a href="{{ url('/course?category=product') }}"
                        class="block rounded-xl border border-blue-300 bg-blue-100 p-4 shadow-sm hover:border-blue-400 hover:ring-1 hover:ring-blue-400 focus:outline-none focus:ring">
                        <span class="inline-block rounded-lg bg-blue-50 p-3">
                            <!-- SVG for Product icon -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Replace with appropriate SVG path for Product -->
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold text-blue-800">Product</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Peluang dan karier di bidang pengembangan produk.
                        </p>
                    </a>

                    <!-- Redaksi -->
                    <a href="{{ url('/course?category=redaksi') }}"
                        class="block rounded-xl border border-blue-300 bg-blue-100 p-4 shadow-sm hover:border-blue-400 hover:ring-1 hover:ring-blue-400 focus:outline-none focus:ring">
                        <span class="inline-block rounded-lg bg-blue-50 p-3">
                            <!-- SVG for Redaksi icon -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Replace with appropriate SVG path for Redaksi -->
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold text-blue-800">Redaksi</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Peluang dan karier di bidang editorial dan penulisan.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
