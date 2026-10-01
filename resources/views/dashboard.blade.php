<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 overflow-hidden shadow-xl rounded-lg mb-6 border border-blue-500/30">
                <div class="p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold !text-white mb-2 drop-shadow-[0_2px_4px_rgba(0,0,0,0.5)]">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                            <p class="!text-white font-medium drop-shadow-[0_1px_2px_rgba(0,0,0,0.5)]">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg px-6 py-3 border border-white/20">
                                <p class="text-sm !text-white/90 font-medium">Role Anda</p>
                                <p class="text-2xl font-bold !text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.5)]">{{ ucfirst(Auth::user()->role) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Role Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 {{ Auth::user()->role === 'admin' ? 'border-blue-500' : 'border-green-500' }}">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 {{ Auth::user()->role === 'admin' ? 'bg-blue-100' : 'bg-green-100' }} rounded-md p-3">
                                <svg class="h-6 w-6 {{ Auth::user()->role === 'admin' ? 'text-blue-600' : 'text-green-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Status Role</p>
                                <p class="text-xl font-semibold text-gray-900">{{ ucfirst(Auth::user()->role) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Access Level Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Level Akses</p>
                                <p class="text-xl font-semibold text-gray-900">{{ Auth::user()->role === 'admin' ? 'Full Access' : 'Read Only' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-indigo-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Data</p>
                                <p class="text-xl font-semibold text-gray-900">Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info & Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Info Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Akses
                        </h4>

                        @if(Auth::user()->role === 'admin')
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-gray-700">Melihat data mahasiswa</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-gray-700">Menambah mahasiswa baru</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-gray-700">Mengubah data mahasiswa</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-gray-700">Menghapus data mahasiswa</p>
                                </div>
                            </div>
                            <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                <p class="text-sm text-blue-800">
                                    <strong>Admin:</strong> Anda memiliki akses penuh untuk mengelola semua data mahasiswa.
                                </p>
                            </div>
                        @else
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-gray-700">Melihat data mahasiswa</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <p class="text-gray-400">Menambah mahasiswa baru</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <p class="text-gray-400">Mengubah data mahasiswa</p>
                                </div>
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <p class="text-gray-400">Menghapus data mahasiswa</p>
                                </div>
                            </div>
                            <div class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <p class="text-sm text-green-800">
                                    <strong>User:</strong> Anda hanya dapat melihat data mahasiswa. Hubungi admin untuk perubahan data.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Quick Actions
                        </h4>

                        <div class="space-y-3">
                            <a href="{{ route('mahasiswa.index') }}" class="flex items-center p-4 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white rounded-lg transition duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="h-6 w-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold">Data Mahasiswa</p>
                                    <p class="text-sm text-indigo-100">Lihat daftar mahasiswa</p>
                                </div>
                            </a>

                            @if(Auth::user()->role === 'admin')
                            <a href="{{ route('mahasiswa.create') }}" class="flex items-center p-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-lg transition duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="h-6 w-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold">Tambah Mahasiswa</p>
                                    <p class="text-sm text-green-100">Daftarkan mahasiswa baru</p>
                                </div>
                            </a>
                            @endif

                            <a href="{{ route('profile.edit') }}" class="flex items-center p-4 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white rounded-lg transition duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="h-6 w-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold">Profile Settings</p>
                                    <p class="text-sm text-gray-100">Update profil Anda</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
