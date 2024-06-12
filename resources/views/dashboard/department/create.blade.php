<!-- resources/views/dashboard/department/create.blade.php -->

<x-layout title="{{ $title }}">
  <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold leading-tight text-gray-900 dark:text-gray-100">{{ $title }}</h1>
    <div class="mt-6">
      <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <div class="space-y-6">

          <div>
            <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Program
              Studi</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">
            @error('code')
              <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Program
              Studi</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">
            @error('name')
              <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div>
            <label for="head" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ketua Program
              Studi</label>
            <select name="head" id="head" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">
              <option value="">Pilih Ketua Program Studi</option>
              @foreach ($headOfDepartment as $head)
                <option value="{{ $head->id }}" {{ old('head') == $head->id ? 'selected' : '' }}>
                  {{ $head->name }}
                </option>
              @endforeach
            </select>
            @error('head')
              <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div>
            <label for="description"
              class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">{{ old('description') }}</textarea>
            @error('description')
              <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="flex justify-end">
            <x-primary-button>Save</x-primary-button>
          </div>

        </div>
      </form>
    </div>
  </div>
</x-layout>
