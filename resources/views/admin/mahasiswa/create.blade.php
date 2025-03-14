<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <label>NIM:</label>
    <input type="text" name="NIM" required>
    
    <label>Nama:</label>
    <input type="text" name="nama_mahasiswa" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password Akun:</label>
    <input type="password" name="password" required>

    <label>Kelas:</label>
    <input type="text" name="kelas" required>

    <label>Prodi:</label>
    <input type="text" name="prodi" required>

    <button type="submit">Tambah Mahasiswa</button>
</form>
