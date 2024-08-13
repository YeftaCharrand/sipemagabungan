<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Edit Mahasiswa</title>
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
                <!-- Widget Notifikasi -->
                {{-- <x-widget-notifikasi></x-widget-notifikasi> --}}

                <!-- Tabel -->
                <div class="bg-white dark:bg-gray-800 p-4 shadow-md rounded-lg">
                    <div
                        class="flex flex-col md:flex-row md:items-center md:justify-between space-y-2 md:space-y-0 md:space-x-2 p-3">
                        <div class="flex-1 flex space-x-10">
                            <h5>
                                <span class="text-gray-500">Daftar Permintaan Akses Edit</span>
                            </h5>
                            <div class="w-auto md:w-3/4">
                                <form class="flex items-center float-right" action="{{ route('search.mahasiswa') }}" method="GET">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search" name="mahasiswa_id" placeholder="Cari Mahasiswa ID" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-2 border-t dark:border-gray-700">
                    </div>


                    <div id="tampil" class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-5 text-center">Kelas</th>
                                <th scope="col" class="p-5 text-center">Mahasiswa</th>
                                <th scope="col" class="p-5 text-center">Keterangan</th>
                                <th scope="col" class="p-5 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestEdit as $re)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="text-center px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $re->kelas->name ?? 'Tidak ada data' }}
                                    </td>
                                    <td class="text-center px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $re->mahasiswa_id ?? 'Tidak ada data' }}
                                    </td>
                                    <td class="text-center px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $re->keterangan }}
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex justify-center items-center space-x-4">
                                            <!-- Form Setujui -->
                                            <form action="{{ route('update.request') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui?');" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $re->mahasiswa->id }}">
                                                <input type="hidden" name="edit" value="1">
                                                <button type="submit" class="flex items-center text-green-400 hover:text-white border border-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-100 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-200 dark:text-green-200 dark:hover:text-white dark:hover:bg-green-200 dark:focus:ring-green-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true">
                                                        <path d="M173.898 439.404l-166.4-166.4c-8.836-8.836-8.836-23.142 0-31.978s23.142-8.836 31.978 0l132.468 132.47L472.564 39.686c8.836-8.836 23.142-8.836 31.978 0s8.836 23.142 0 31.978L205.876 439.404c-8.839 8.836-23.147 8.836-31.978 0z"/>
                                                    </svg>
                                                    Setujui
                                                </button>
                                            </form>
                                        
                                            <!-- Form Tolak -->
                                            <form action="{{ route('update.request') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak?');" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $re->mahasiswa->id }}">
                                                <input type="hidden" name="edit" value="0">
                                                <button type="submit" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                    Tolak
                                                </button>
                                            </form> 
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
        </section>


        <!-- Main modal Setujui -->
        @include('partials.setujui-modal')

        <!-- Tolak Modal -->
        @include('partials.tolak-modal')

        </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

        <script>
            function confirmSetujui(form) {
                if (confirm("Apakah anda ingin memberikan Akses Edit kepada mahasiswa ini?")) {
                    return true;
                } else {
                    return false;
                }
            }
        
            function confirmTolak(form) {
                if (confirm("Apakah anda yakin ingin menolak Akses Edit untuk mahasiswa ini?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

    </body>

</html>
