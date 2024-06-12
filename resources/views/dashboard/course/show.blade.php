<x-layout :title="$title">
  <div class="px-4 sm:px-0">
    <div class="flex items-center gap-6">
      <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-50">Informasi Matakuliah</h3>
      @if (session()->has('status'))
        <x-status-alert />
      @endif
    </div>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">{{ $course->name }}</p>
  </div>
  <div class="mt-6 border-t border-gray-100 dark:border-gray-700">
    <dl class="divide-y divide-gray-100 dark:divide-gray-700">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Kode Matakuliah</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">{{ $course->code }}
        </dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Nama Matakuliah</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">{{ $course->name }}
        </dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Semester</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $course->semester }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Jumlah SKS / Wajib?</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $course->credits }} / {{ $course->is_must ? 'Ya' : 'Tidak' }}
        </dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Jenis</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">{{ $course->type }}
        </dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Deskripsi</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $course->description }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Program Studi</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-gray-400">
          {{ $course->department->name }}</dd>
      </div>
      <div class="py-6 grid grid-cols-2">
        <div class="font-medium leading-6">
          <a href="{{ route('course.index') }}"
            class="text-indigo-600 hover:text-indigo-500 dark:text-lime-400 dark:hover:text-lime-500">← Back</a>
        </div>
        <div class="grid grid-cols-1 justify-items-end gap-y-4">
          <a href="{{ route('course.edit', ['course' => $course]) }}"
            class="text-indigo-600 hover:text-indigo-500 dark:text-lime-400 dark:hover:text-lime-500">Edit →</a>
          <x-form class="space-y-0" action="{{ route('course.destroy', ['course' => $course]) }}">
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
