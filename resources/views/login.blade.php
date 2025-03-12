<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role - Sidang Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-soft-blue {
            background-color: #A3CFF5;
            color: #FFFFFF;
            border: none;
        }
        .btn-soft-blue:hover {
            background-color: #82B7E5;
        }
    </style>
    <script>
        function showLoginForm() {
            var role = document.getElementById("role").value;
            if (role) {
                document.getElementById("roleSelection").style.display = "none";
                document.getElementById("loginForm").style.display = "block";
                document.getElementById("selectedRole").innerText = role.charAt(0).toUpperCase() + role.slice(1);
                document.getElementById("loginButton").setAttribute("onclick", "redirectToDashboard('" + role + "')");
            } else {
                alert("Silakan pilih role terlebih dahulu");
            }
        }
        
        function redirectToDashboard(role) {
            alert("Login sebagai " + role);
            window.location.href = "/dashboard?role=" + role;
        }
    </script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <!-- Pilih Role -->
        <div id="roleSelection" class="card p-4 shadow w-50 mx-auto">
            <h4 class="mb-3">Pilih Role</h4>
            <div class="form-floating mb-2">
                <select class="form-select" id="role" required>
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                </select>
                <label for="role">Role</label>
            </div>
            <button class="btn btn-soft-blue w-100 py-2" onclick="showLoginForm()">Lanjut</button>
        </div>
        
        <!-- Form Login -->
        <div id="loginForm" class="card p-4 shadow w-50 mx-auto" style="display: none;">
            <h4 class="mb-3">Login sebagai <span id="selectedRole"></span></h4>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-soft-blue w-100 py-2" id="loginButton">Masuk</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
