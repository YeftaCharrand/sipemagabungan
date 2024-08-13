{{-- <!-- Dropdown Pilih Kelas -->
<div class="container mx-auto p-4">
    <!-- Box Container -->
    <div class="bg-white dark:bg-gray-800 p-6 shadow-lg rounded-lg border border-gray-300 dark:border-gray-700">
        <!-- Title -->
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-300 mb-4">Pilih Kelas</h2>
        <!-- Dropdown Form -->
        <form action="{{ route('dosen.filterByClass') }}" method="GET">
            <div class="relative">
                <select id="classes"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 appearance-none">
                    <option selected>Silahkan Pilih Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div> --}}
