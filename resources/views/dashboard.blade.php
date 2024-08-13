<!-- resources/views/mahasiswa.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <!-- Header dan Informasi Pengguna -->
                <x-info-user></x-info-user>

                <div class="container mx-auto p-4">
                    <!-- Kontainer Utama -->
                    <div
                        class="bg-white dark:bg-gray-800 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700 space-y-6">
                        <!-- Button Kelas -->
                        <div class="container mx-auto space-y-4 p-4">
                            {{-- <button type="button" class=" inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 ">
                            Kelas : TI 2B
                            </button> --}}
                            <!-- Informasi Dosen Wali -->
                            <div
                                class="bg-white dark:bg-gray-800 p-6 shadow-lg rounded-lg mb-6 border border-gray-300 dark:border-gray-700">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div
                                        class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <i class="fas fa-user-alt text-gray-500 dark:text-gray-400 text-3xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                            {{ Auth::user()->dosen->name }}</h5>
                                        {{-- @if ($kelasName) --}}
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Wali Kelas
                                            {{ $kelasName }}</p>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t pt-4">
                                    <div class="space-y-2">
                                        <p class="text-gray-700 dark:text-gray-400"><strong>NIP :
                                            </strong>{{ $nip }}</p>
                                        {{-- <p class="text-gray-700 dark:text-gray-400"><strong>No. HP:</strong>
                                            081234567890</p> --}}
                                    </div>
                                    {{-- <div class="space-y-2">
                                        <p class="text-gray-700 dark:text-gray-400"><strong>Email:</strong>
                                            ahmadyani@gmail.com</p>
                                    </div> --}}
                                </div>
                            </div>

                            @if ($isDosenWali)
                            <div class="bg-white dark:bg-gray-800 p-4 shadow-md rounded-lg mb-6">
                                <div
                                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                    <div class="flex-1 flex items-center space-x-2">
                                        <h5>
                                            <span class="text-gray-500">Tabel Data Mahasiswa</span>
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
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                                    </svg>
                                                </div>
                                                <input type="text" id="simple-search" placeholder="Cari"
                                                    required=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal toggle -->
                                    <div class="flex justify-center m-5">
                                        <button id="defaultModalButton" data-modal-target="defaultModal"
                                            data-modal-toggle="defaultModal"
                                            class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                            type="button">
                                            + Tetapkan Mahasiswa
                                        </button>

                                        <!-- Main modal Tambah -->
                                        @include('partials.tambah-modal')
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
                                                <th scope="col" class="p-4 text-center">Actions</th>
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
                                                    {{-- @if ($isDosenWali) --}}
                                                    <td
                                                        class="px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex justify-center items-center space-x-4">
                                                            <form action="{{ route('dosen.update', $m->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $m->id }}">
                                                                <button id="updateProductButton"
                                                                    data-modal-target="updateProductModal"
                                                                    data-modal-toggle="updateProductModal"
                                                                    class="flex items-center text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-yellow-200 dark:text-yellow-200 dark:hover:text-white dark:hover:bg-yellow-200 dark:focus:ring-yellow-500"
                                                                    type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path
                                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </form>
                                                            <!-- Update Product Modal -->
                                                            @include('partials.edit-modal')
                                                            <button type="button" data-modal-target="delete-modal"
                                                                data-modal-toggle="delete-modal"
                                                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                Keluarkan
                                                            </button>
                                                            <!-- Delete Modal -->
                                                            @include('partials.delete-modal')
                                                        </div>
                                                    </td>
                                                    {{-- @endif --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                                    aria-label="Table navigation">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        Showing
                                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                                        of
                                        <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                                    </span>
                                    <ul class="inline-flex items-stretch -space-x-px">
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Previous</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-current="page"
                                                class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Next</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav> --}}
                            </div>
                            @endif
                        </div>






            </main>
        </div>
    </body>


</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>

</html>
