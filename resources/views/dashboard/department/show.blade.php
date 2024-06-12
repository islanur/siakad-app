<x-layout title="{{ $title }}">
  <div class="px-4 sm:px-0">
    <div class="flex items-center gap-6">
      <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-50">Informasi Program Studi</h3>
      @if (session()->has('status'))
        <x-status-alert />
      @endif
    </div>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">{{ $department->name }}</p>
  </div>

  <div class="mt-6 border-t border-gray-100 dark:border-gray-700">
    <dl class="divide-y divide-gray-100 dark:divide-gray-700">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Nama</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">{{ $department->name }}
        </dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Kode</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $department->code }}</dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Ketua Program Studi</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          @if ($department->headOfDepartment)
            <div class="flex items-center gap-x-4">
              <img src="{{ $department->headOfDepartment->profile_image }}" alt="Profile Image"
                class="h-10 w-10 rounded-full bg-gray-50">
              <a href="#" class="text-gray-900 dark:text-gray-200">{{ $department->headOfDepartment->name }}</a>
            </div>
          @else
            <div class="flex items-center gap-x-4">
              <span class="text-gray-500 dark:text-gray-400">Data ketua program studi belum ditambahkan</span>
            </div>
          @endif
        </dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Mahasiswa Aktif</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">{{ $students_count }}
        </dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Deskripsi</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $department->description }}</dd>
      </div>

      <div class="py-6 grid grid-cols-2">
        <div class="font-medium leading-6">
          <a href="{{ route('department.index') }}"
            class="text-indigo-600 hover:text-indigo-500 dark:text-lime-400 dark:hover:text-lime-500">← Back</a>
        </div>
        <div class="grid grid-cols-1 justify-items-end gap-y-4">
          <a href="{{ route('department.edit', ['department' => $department]) }}"
            class="text-indigo-600 hover:text-indigo-500 dark:text-lime-400 dark:hover:text-lime-500">Edit →</a>
          <x-form class="space-y-0" action="{{ route('department.destroy', ['department' => $department]) }}">
            @method('DELETE')
            <button type="submit"
              class="text-indigo-600 hover:text-indigo-500 dark:text-rose-400 dark:hover:text-rose-500">Delete
              →</button>
          </x-form>
        </div>
      </div>
    </dl>
  </div>
</x-layout>
