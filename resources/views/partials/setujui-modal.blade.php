{{-- <!-- Modal Setujui -->
<div id="readProductModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 bg-black bg-opacity-50 justify-center items-center">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto mx-auto mt-10">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <h3 class="font-semibold">
                        Detail Permintaan Edit Data Mahasiswa
                    </h3>
                </div>
                <div>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="readProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <dl>
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">NIM : </dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $mahasiswa->mahasiswa->nim }}
                </dd>
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama : </dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $mahasiswa->mahasiswa->name }}
                </dd>
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Keterangan : </dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $mahasiswa->keterangan }}</dd>
            </dl>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3 sm:space-x-4">
                </div>
                <form action="{{ route('update.request') }}" method="POST">
                    @csrf
                    <!-- Input Hidden untuk ID Mahasiswa -->
                    <input type="hidden" name="id">
                    <!-- Input Hidden untuk menandai edit -->
                    <input type="hidden" name="edit" value="1">
                    <button type="submit"
                        class="flex items-center text-green-400 hover:text-white border border-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-100 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-200 dark:text-green-200 dark:hover:text-white dark:hover:bg-green-200 dark:focus:ring-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 512 512"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M173.898 439.404l-166.4-166.4c-8.836-8.836-8.836-23.142 0-31.978s23.142-8.836 31.978 0l132.468 132.47L472.564 39.686c8.836-8.836 23.142-8.836 31.978 0s8.836 23.142 0 31.978L205.876 439.404c-8.839 8.836-23.147 8.836-31.978 0z" />
                        </svg>
                        Setujui
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('readProductButton').click();
    });
</script> --}}
