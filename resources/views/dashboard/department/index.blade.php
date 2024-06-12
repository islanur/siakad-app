<x-layout title="{{ $title }}">
  <div class="flex items-center gap-6">
    <x-primary-link href="{{ route('department.create') }}">Tambah Data</x-primary-link>
    @if (session()->has('status'))
      <x-status-alert />
    @endif
  </div>
  <div
    class="mx-auto mt-10 grid max-w-2xl sm:grid-cols-2 grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3 dark:border-gray-600">
    @foreach ($departments as $department)
      <div class="flex max-w-xl flex-col items-start justify-between dark:hover:bg-slate-700 p-4 rounded-lg">
        <div class="flex items-center gap-x-4 text-xs">
          <time datetime="2020-03-16" class="text-gray-500 dark:text-gray-300">Updated At:
            {{ $department->updated_at->diffForHumans() }}</time>
        </div>
        <div class="group relative">
          <h3
            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 dark:text-gray-100 dark:group-hover:text-gray-400">
            <a href="{{ route('department.show', ['department' => $department]) }}">
              <span class="absolute inset-0"></span>
              {{ $department->name }}
            </a>
          </h3>

          <p class="mt-1 line-clamp-3 text-xs leading-6 text-gray-600 dark:text-gray-400">
            {{ $department->code }}
          </p>

          <div class="flex justify-between mt-5">
            <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
              Jumlah Mahasiswa Aktif
            </p>
            <p class="line-clamp-3 text-sm leading-6 text-gray-700 dark:text-gray-200">
              {{ $department->students_count }}
            </p>
          </div>
          <div class="flex justify-between mt-2">
            <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
              Jumlah Dosen
            </p>
            <p class="line-clamp-3 text-sm leading-6 text-gray-700 dark:text-gray-200">
              {{ $department->lecturers_count }}
            </p>
          </div>
          <div class="flex justify-between mt-2">
            <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
              Jumlah Matakuliah
            </p>
            <p class="line-clamp-3 text-sm leading-6 text-gray-700 dark:text-gray-200">
              {{ $department->courses_count }}
            </p>
          </div>

          <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $department->description }}
          </p>
        </div>
        @if ($department->headOfDepartment)
          <div class="relative mt-8 flex items-center gap-x-4">
            <img src="{{ $department->headOfDepartment->profile_image }}" alt="Profile Image"
              class="h-10 w-10 rounded-full bg-gray-50">
            <div class="text-sm leading-6">
              <p class="font-semibold text-gray-900 dark:text-gray-200">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  {{ $department->headOfDepartment->name }}
                </a>
              </p>
              <p class="text-gray-600 dark:text-gray-500">Ketua Program Studi</p>
            </div>
          </div>
        @else
          <div class="relative mt-8 flex items-center gap-x-4">
            <div class="text-sm leading-6">
              <p class="font-semibold text-gray-900 dark:text-gray-200">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  Tidak ada data ketua program studi
                </a>
              </p>
            </div>
          </div>
        @endif
      </div>
    @endforeach
  </div>
</x-layout>
