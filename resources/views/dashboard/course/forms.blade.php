<x-layout :title="$title">
  <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $title }}
        </h2>

        <form action="{{ isset($course) ? route('course.update', $course) : route('course.store') }}" method="POST"
          class="mt-6 space-y-6">
          @csrf
          @if (isset($course))
            @method('PUT')
          @endif

          <div>
            <x-input-label for="code" :value="__('Kode Matakuliah')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $course->code ?? '')"
              required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('code')" />
          </div>

          <div>
            <x-input-label for="name" :value="__('Nama Matakuliah')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $course->name ?? '')"
              required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <x-input-label for="semester" :value="__('Semester')" />
              <x-text-input id="semester" class="block mt-1 w-full" type="number" name="semester" :value="old('semester', $course->semester ?? '')"
                required />
              <x-input-error class="mt-2" :messages="$errors->get('semester')" />
            </div>

            <div>
              <x-input-label for="credits" :value="__('Credits')" />
              <x-text-input id="credits" class="block mt-1 w-full" type="number" name="credits" :value="old('credits', $course->credits ?? '')"
                required />
              <x-input-error class="mt-2" :messages="$errors->get('credits')" />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <x-select-input id="is_must" name="is_must" :options="['1' => 'Wajib', '0' => 'Pilihan']" :selected="old('is_must', $course->is_must ?? 1)">
                Wajib / Pilihan
              </x-select-input>
            </div>

            <div>
              <x-input-label for="type" :value="__('Type')" />
              <select id="type" name="type"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach ($courseTypes as $type)
                  <option value="{{ $type }}"
                    {{ old('type', $course->type ?? 'Teori') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>
          </div>

          <div>
            <x-select-input id="department_id" name="department_id" :options="$departments->pluck('name', 'id')" :selected="old('department_id', $course->department_id ?? '')">
              Department
            </x-select-input>
          </div>

          <div>
            <x-input-label for="description" :value="__('Deskripsi Matakuliah')" />
            <textarea id="description" name="description" rows="4"
              class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description', $course->description ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-secondary-link href="{{ route('course.index') }}" class="mr-4">
              {{ __('Kembali') }}
            </x-secondary-link>

            <x-primary-button>
              {{ isset($course) ? __('Update Data') : __('Simpan Data') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
