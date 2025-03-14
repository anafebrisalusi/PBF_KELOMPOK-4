<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidang Akhir</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        /* Import Google Font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
        /* Efek gradien pada teks */
        .gradient-text {
    background: linear-gradient(45deg, #00FFFF, #BF40BF);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 3px 3px 8px rgba(255, 255, 255, 0.8), 
                 0px 0px 15px rgba(0, 255, 255, 0.9);

        
    }
     /* Terapkan font khusus */
     .custom-font {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
     }
    

        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #343a40;
            padding: 20px;
        }
        .main-content {
            margin-left: 300px;
            padding: 20px;
            width: 100%;
        }

        .nav-link {
            transition: background 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: #495057 !important;
            color: #f8f9fa !important;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 text-bg-dark sidebar">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <span class="fs-4 fw-bold gradient-text">Sidang Akhir</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active custom-nav-link" onclick="loadContent('dashboard', this)">
                    <i class="bi bi-house-door me-2"></i> Halaman Utama
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white custom-nav-link" onclick="loadContent('mahasiswa', this)">
                    <i class="bi bi-person me-2"></i> Mahasiswa
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white custom-nav-link" onclick="loadContent('jadwalsidang', this)">
                    <i class="bi bi-file-earmark-text me-2"></i> Jadwal Sidang
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white custom-nav-link" onclick="loadContent('dosen', this)">
                    <i class="bi bi-person-vcard me-2"></i> Dosen Penguji
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white custom-nav-link" onclick="loadContent('hasilsidang', this)">
                    <i class="bi bi-file-earmark-check me-2"></i> Hasil Sidang
                </a>
            </li>
        </ul>
        <hr>
        <!-- Tambahkan Tombol Sign Out di Bawah -->
        <div class="text-center mb-3">
            <button class="btn btn-danger w-100" onclick="signOut()">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </button>
        </div>
    </div>
    
    
    
    <!-- Main Content -->
    <div class="main-content">
        <div id="contentArea">
            <h2>Welcome!</h2>
            <p>Pilih menu di sidebar untuk melihat konten.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript untuk Mengubah Konten -->
    
        
        <script>
    function loadContent(page, element) {
        // Hapus 'active' dari semua link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });

        // Tambahkan 'active' ke link yang diklik
        element.classList.add('active');

        // Ubah konten sesuai halaman yang dipilih
        let contentArea = document.getElementById('contentArea');
        if (page === 'dashboard') {
            contentArea.innerHTML = "<h2>Dashboard</h2><p>Selamat datang di halaman utama.</p>";
        } else if (page === 'mahasiswa') {
            contentArea.innerHTML = "<h2>Data Mahasiswa</h2><table class='table'><thead><tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Alamat</th><th>Kelas</th><th>Judul TA</th><th>Aksi</th></tr></thead><tbody id='datamahasiswa'></tbody></table>";
            loadData("mahasiswa", "datamahasiswa");
        } else if (page === 'jadwalsidang') {
            contentArea.innerHTML = "<h2>Jadwal Sidang</h2><table class='table'><thead><tr><th>Mahasiswa</th><th>Dosen</th><th>Hari</th><th>Jam</th><th>Ruang</th></tr></thead><tbody id='jadwalsidang'></tbody></table>";
            loadData("jadwalsidang", "jadwalsidang");
        } else if (page === 'dosen') {
            contentArea.innerHTML = "<h2>Dosen Penguji</h2><table class='table'><thead><tr><th>NIDN</th><th>Nama Dosen</th></tr></thead><tbody id='dosen'></tbody></table>";
            loadData("dosen", "dosen");
        } else if (page === 'hasilsidang') {
            contentArea.innerHTML = "<h2>Hasil Sidang</h2><table class='table'><thead><tr><th>Nama Mahasiswa</th><th>NIM</th><th>Nilai</th><th>Catatan</th></tr></thead><tbody id='hasilsidang'></tbody></table>";
            loadData("hasilsidang", "hasilsidang");
        }
    }

    function loadData(type, targetElement) {
        fetch(`api/get_data.php?type=${type}`)
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById(targetElement);
                tableBody.innerHTML = ""; // Kosongkan isi tabel sebelum diisi ulang
                
                data.forEach(item => {
                    let row = "";

                    if (type === "mahasiswa") {
                        row = `<tr>
                            <td>${item.NIM}</td>
                            <td>${item.nama_mahasiswa}</td>
                            <td>${item.prodi}</td>
                            <td>${item.alamat}</td>
                            <td>${item.kelas}</td>
                            <td>${item.judul_tugasakhir}</td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>`;
                    } else if (type === "jadwalsidang") {
                        row = `<tr>
                            <td>${item.nama_mahasiswa}</td>
                            <td>${item.nama_dosen}</td>
                            <td>${item.hari}</td>
                            <td>${item.jam}</td>
                            <td>${item.ruang_sidang}</td>
                        </tr>`;
                    } else if (type === "dosen") {
                        row = `<tr>
                            <td>${item.NIDN}</td>
                            <td>${item.nama_dosen}</td>
                        </tr>`;
                    } else if (type === "hasilsidang") {
                        row = `<tr>
                            <td>${item.nama_mahasiswa}</td>
                            <td>${item.NIM}</td>
                            <td>${item.nilai}</td>
                            <td>${item.catatan}</td>
                        </tr>`;
                    }

                    tableBody.innerHTML += row;
                });
            })
            .catch(error => console.error("Error:", error));
    }

    function signOut() {
        window.location.href = "/login"; // Redirect langsung ke halaman login
    }
</script>



        
    
</body>
</html>
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Sidang</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Sidang</th>
                <th>NIM</th>
                <th>NIDN</th>
                <th>Waktu</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sidang as $s)
            <tr>
                <td>{{ $s['id_sidang'] }}</td>
                <td>{{ $s['NIM'] }}</td>
                <td>{{ $s['NIDN'] }}</td>
                <td>{{ $s['waktu_sidang'] }}</td>
                <td>{{ $s['ruang_sidang'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
>>>>>>> master
