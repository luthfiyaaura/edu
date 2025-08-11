@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <form action="{{ route('admin.student.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Siswa</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">NIS</label>
            <input type="text" name="nis" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tahun Ajaran</label>
            <select id="school_year" name="tahun_ajaran_id" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Pilih Tahun Ajaran --</option>
                @foreach ($schoolYears as $year)
                    <option value="{{ $year->id }}">{{ $year->tahun }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Jurusan</label>
            <select id="major" name="major_id" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Pilih Jurusan --</option>
                {{-- data jurusan akan diisi AJAX --}}
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Kelas</label>
            <select id="student_class" name="student_class_id" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Pilih Kelas --</option>
                {{-- data kelas akan diisi AJAX --}}
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah
        </button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#school_year').change(function() {
            let yearId = $(this).val();
            $('#major').html('<option value="">-- Pilih Jurusan --</option>');
            $('#student_class').html('<option value="">-- Pilih Kelas --</option>');
            if (yearId) {
                $.get('/admin/get-majors/' + yearId, function(data) {
                    data.forEach(function(major) {
                        $('#major').append(`<option value="${major.id}">${major.desc}</option>`);
                    });
                });
            }
        });

        $('#major').change(function() {
            let majorId = $(this).val();
            $('#student_class').html('<option value="">-- Pilih Kelas --</option>');
            if (majorId) {
                $.get('/admin/get-classes/' + majorId, function(data) {
                    data.forEach(function(cls) {
                        $('#student_class').append(`<option value="${cls.id}">${cls.desc}</option>`);
                    });
                });
            }
        });
    });
</script>
@endsection
