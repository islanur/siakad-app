<form {{ $attributes }} method="POST" class="space-y-6">
  @csrf
  {{ $slot }}
</form>
