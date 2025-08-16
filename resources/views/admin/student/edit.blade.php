@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Siswa -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Siswa</label>
            <input type="text" name="name" class="w-full border rounded p-2" required value="{{ old('name', $student->name) }}">
        </div>

        <!-- NIS -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">NIS</label>
            <input type="text" name="nis" class="w-full border rounded p-2" required value="{{ old('nis', $student->nis) }}">
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tahun Ajaran</label>
            <select id="school_year" name="school_year_id" class="w-full border rounded p-2" required>
                <option value="" disabled {{ old('school_year_id', $student->school_year_id) ? '' : 'selected' }}>-- Pilih Tahun Ajaran --</option>
                @foreach ($schoolYears as $year)
                    <option value="{{ $year->id }}" {{ old('school_year_id', $student->school_year_id) == $year->id ? 'selected' : '' }}>
                        {{-- {{ $year->tahun }} --}}
                        {{ $schoolYear->year }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Jurusan -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Jurusan</label>
            <select id="major" name="jurusan" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Pilih Jurusan --</option>
            </select>
        </div>

        <!-- Kelas -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Kelas</label>
            <select id="student_class" name="kelas" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Pilih Kelas --</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let oldYear = '{{ old("school_year_id", $student->school_year_id) }}';
        let oldMajor = '{{ old("major_id", $student->major) }}';
        let oldClass = '{{ old("kelas", $student->kelas) }}';

        function loadMajors(yearId, selectedMajor = null) {
            if (!yearId) return;
            $.get("{{ url('/admin/get-majors') }}/" + yearId, function(data) {
                $('#major').html('<option value="">-- Pilih Jurusan --</option>');
                data.forEach(function(major) {
                    let selected = (major.id == selectedMajor) ? 'selected' : '';
                    $('#major').append('<option value="'+major.id+'" '+selected+'>'+major.desc+'</option>');
                });
                if(selectedMajor){
                    loadClasses(selectedMajor, oldClass);
                }
            });
        }

        function loadClasses(majorId, selectedClass = null) {
            if (!majorId) return;
            $.get("{{ url('/admin/get-classes') }}/" + majorId, function(data) {
                $('#student_class').html('<option value="">-- Pilih Kelas --</option>');
                data.forEach(function(cls) {
                    let selected = (cls.id == selectedClass) ? 'selected' : '';
                    $('#student_class').append('<option value="'+cls.id+'" '+selected+'>'+cls.desc+'</option>');
                });
            });
        }

        if(oldYear){
            loadMajors(oldYear, oldMajor);
        }

        $('#school_year').change(function() {
            let yearId = $(this).val();
            $('#major').html('<option value="">-- Pilih Jurusan --</option>');
            $('#student_class').html('<option value="">-- Pilih Kelas --</option>');
            loadMajors(yearId);
        });

        $('#major').change(function() {
            let majorId = $(this).val();
            $('#student_class').html('<option value="">-- Pilih Kelas --</option>');
            loadClasses(majorId);
        });
    });
</script>
@endsection
