<!-- resources/views/components/select.blade.php -->
@props(['id', 'name', 'options', 'selected' => null])

<div>
  <label for="{{ $id }}"
    class="block text-sm font-medium text-gray-700 dark:text-gray-400">{{ $slot }}</label>
  <select id="{{ $id }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    <option value="" disabled selected>Pilih {{ $slot }}</option>
    @foreach ($options as $key => $value)
      <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>
        {{ $value }}
      </option>
    @endforeach
  </select>
  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>
