<x-layout :title="$title">
  <div class="flex items-center gap-6">
    <x-primary-link href="{{ route('course.create') }}">Tambah Data</x-primary-link>
    @if (session()->has('status'))
      <x-status-alert />
    @endif
  </div>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-8 hidden sm:block">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Kode
          </th>
          <th scope="col" class="hidden lg:table-cell px-6 py-3">
            Program Studi
          </th>
          <th scope="col" class="hidden md:table-cell px-6 py-3">
            SKS
          </th>
          <th scope="col" class="px-6 py-3">
            Jenis
          </th>
          <th scope="col" class="hidden md:table-cell px-6 py-3">
            Wajib
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $course)
          <tr
            class="group relative bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row"
              class="w-full max-w-0 sm:max-w-none sm:w-auto px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white truncate">
              <a href="{{ route('course.show', ['course' => $course]) }}"><span
                  class="absolute inset-0"></span>{{ $course->name }}</a>
              <dl class="lg:hidden font-normal text-slate-400">
                <dt class="sr-only lg:hidden">Program Studi</dt>
                <dd class="lg:hidden mt-1 truncate">{{ $course->department->name }}</dd>
                <dt class="sr-only md:hidden">SKS</dt>
                <dd class="md:hidden mt-1">{{ $course->credits }} SKS</dd>
                <dt class="sr-only md:hidden">Wajib</dt>
                <dd class="md:hidden mt-1">{{ $course->is_must ? 'Wajib' : 'Pilihan' }}</dd>
              </dl>
            </th>
            <td class="px-6 py-4">
              {{ $course->code }}
            </td>
            <td class="hidden lg:table-cell px-6 py-4">
              {{ $course->department->name }}
            </td>
            <td class="hidden md:table-cell px-6 py-4">
              {{ $course->credits }}
            </td>
            <td class="px-6 py-4">
              {{ $course->type }}
            </td>
            <td class="hidden md:table-cell px-6 py-4">
              {{ $course->is_must ? 'Ya' : 'Tidak' }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $courses->onEachSide(5)->links() }}

  <div
    class="sm:hidden mx-auto mt-10 grid max-w-2xl sm:grid-cols-2 grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3 dark:border-gray-600">
    @foreach ($courses as $course)
      <div class="flex max-w-xl flex-col items-start justify-between dark:hover:bg-slate-700 p-4 rounded-lg">
        <div class="group relative">
          <h3
            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 dark:text-gray-100 dark:group-hover:text-gray-400">
            <a href="{{ route('course.show', ['course' => $course]) }}">
              <span class="absolute inset-0"></span>
              {{ $course->name }}
            </a>
          </h3>
          <p class="mt-1 line-clamp-3 text-xs leading-6 text-gray-600 dark:text-gray-400">{{ $course->code }}</p>
          <div class="mt-5">
            <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
              {{ $course->department->name }}</p>
            <div class="grid grid-cols-2">
              <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">Semester:
                {{ $course->semester }}
              </p>
              <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">SKS: {{ $course->credits }}
              </p>
              <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">Jenis: {{ $course->type }}</p>
              <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">Wajib:
                {{ $course->is_must ? 'Ya' : 'Tidak' }}</p>
            </div>
          </div>
          <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $course->description }}
          </p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
          <a href="{{ route('course.edit', ['course' => $course]) }}"
            class="text-indigo-600 hover:text-indigo-500 dark:text-lime-400 dark:hover:text-lime-500">Edit</a>
          <x-form class="space-y-0" action="{{ route('course.destroy', ['course' => $course]) }}">
            @method('DELETE')
            <button type="submit"
              class="text-indigo-600 hover:text-indigo-500 dark:text-rose-400 dark:hover:text-rose-500">Delete</button>
          </x-form>
        </div>
      </div>
    @endforeach
  </div>
</x-layout>
