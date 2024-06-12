<x-layout :title="$title">
  <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $title }}
        </h2>

        <x-form action="{{ isset($department) ? route('department.update', $department) : route('department.store') }}"
          class="mt-6 space-y-6">
          @if (isset($department))
            @method('PUT')
          @endif

          <div>
            <x-input-label for="code" :value="__('Kode Program Studi')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $department->code ?? '')" required
              autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('code')" />
          </div>

          <div>
            <x-input-label for="name" :value="__('Nama Program Studi')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $department->name ?? '')"
              required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
          </div>

          <div>
            <x-select-input id="head" name="head" :options="$headOfDepartment->pluck('name', 'id')" :selected="old('head', $department->head ?? '')">
              Ketua Program Studi
            </x-select-input>
          </div>

          <div>
            <x-input-label for="description" :value="__('Deskripsi Program Studi')" />
            <textarea id="description" name="description" rows="4"
              class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description', $department->description ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-secondary-link href="{{ route('department.index') }}" class="mr-4">
              {{ __('Kembali') }}
            </x-secondary-link>

            <x-primary-button>
              {{ isset($department) ? __('Update Data') : __('Simpan Data') }}
            </x-primary-button>
          </div>
        </x-form>
      </div>
    </div>
  </div>
</x-layout>
