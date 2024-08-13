<!-- Header dan Informasi Pengguna -->
<div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 rounded-lg shadow-lg mb-6 text-white">
    <div class="flex items-center space-x-4">
        <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
            <i class="fas fa-user-circle text-gray-500 dark:text-white text-3xl"></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->dosen->name }}</h1>
        </div>
    </div>
</div>