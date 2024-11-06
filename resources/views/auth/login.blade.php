<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="User/css/style2.css">
</head>
<body>
    <!-- Back Button -->
    <a href="javascript:history.back()" class="back-button"><i class="fas fa-arrow-left"></i> Back</a>

    <div class="container">
        <div class="left-panel" style="background: url('{{ asset('User/img/DSC_5537-1320x600.jpg') }}') no-repeat center center; background-size: cover;"></div>

        <div class="right-panel">
            <h1><i class="fas fa-dove"></i>Logo</h1>
            <h2>Log in</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf <!-- Tambahkan token CSRF -->
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">LOGIN</button>
            </form>

            <!-- Tampilkan error jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="#">Forgot password?</a>
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p> <!-- Route ke register -->
        </div>
    </div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="welcomeModalLabel">Welcome</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Logout Berhasil!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            myModal.show();
        });
    </script>
@endif
