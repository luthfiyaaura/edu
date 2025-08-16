<!-- resources/views/admin/test_result/create.blade.php -->
<form action="{{ route('admin.test_result.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="result_type">Hasil Tes</label>
        <select name="result_type" id="result_type" class="form-control">
            <option value="Tidak Setuju">Tidak Setuju</option>
            <option value="Kurang Setuju">Kurang Setuju</option>
            <option value="Ragu">Ragu</option>
            <option value="Setuju">Setuju</option>
            <option value="Sangat Setuju">Sangat Setuju</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
