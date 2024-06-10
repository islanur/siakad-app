<div>
  <!-- enroll.blade.php -->
  <form action="{{ route('enroll.store') }}" method="POST">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <table>
      @foreach ($courses as $course)
        <tr>
          <td><input type="checkbox" name="courses[]" value="{{ $course->id }}"></td>
          <td>{{ $course->name }}</td>
        </tr>
      @endforeach
    </table>
    <button type="submit">Simpan</button>
  </form>
</div>
