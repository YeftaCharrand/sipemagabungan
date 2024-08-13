<!-- resources/views/mahasiswa.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <x-sidebar></x-sidebar>>

    <body class="bg-gray-100">

        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-1/5 bg-gray-100 dark:bg-gray-800 ">
            </aside>

            <!-- Konten utama -->
            <main class="flex-grow p-8 mt-8 mr-3">
                
                <div class="container mx-auto my-4">
                    <!-- Add the Header here -->
                    <h4 class="font-bold text-gray-900 dark:text-white mb-4">Lihat Data Mahasiswa Keseluruhan</h4>
                    
                    <!-- Box Container -->
                    <div
                        class="w-full bg-white dark:bg-gray-800 p-4 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
                        <!-- Title -->
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-300 mb-4">Pilih Kelas</h2>
                        <!-- Dropdown Form -->
                        <form action="{{ route('dosen.filterByClass') }}" method="GET">
                            <div class="relative">
                                <select name="kelas_id" id="kelas" onchange="this.form.submit()"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-[20rem] p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 appearance-none">
                                    <option disabled {{ !request()->has('kelas_id') ? 'selected' : '' }}>Silahkan Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ request()->get('kelas_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        
                    </div>
                </div>

                @if (isset($mahasiswas))
                    <!-- Tabel Mahasiswa -->
                    <div class="bg-white dark:bg-gray-800 p-4 shadow-md rounded-lg mb-6">
                        <div
                            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="flex-1 flex items-center space-x-2">
                                <h5>
                                    <span class="text-gray-500 text-bold text-lg">Tabel Data Mahasiswa</span>
                                </h5>
                                <div id="results-tooltip" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Showing 1-100 of 436 results
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search" placeholder="Cari" required=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="tampil" class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4 text-center">NIM</th>
                                        <th scope="col" class="p-4 text-center">Nama</th>
                                        <th scope="col" class="p-4 text-center">Tempat Lahir</th>
                                        <th scope="col" class="p-4 text-center">Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswas as $m)
                                        <tr
                                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class=" px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $m->nim }}</td>
                                            <td
                                                class="px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $m->name }}</td>
                                            <td
                                                class="px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $m->tempat_lahir }}</td>
                                            <td
                                                class="px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $m->tanggal_lahir }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
        </div>
        </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </body>

</html>
