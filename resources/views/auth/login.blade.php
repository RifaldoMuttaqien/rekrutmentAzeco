<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])    
    <title>Document</title>
</head>
<body class="bg-primary py-3 py-md-5 py-xl-8">
    <header>
        <nav></nav>
    </header>

    <section >
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center text-bg-primary">
                        <div class="col-12 col-xl-10 text-center">
                            <img class="img-fluid rounded mb-4" loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn9gZgnTB49ZZwPb6oRi2D6Mfj7y1owXQiLQ&s" width="145" height="80" alt="BootstrapBrain Logo">
                            <hr class="border-primary-subtle mb-4">
                            <h2 class="h1 mb-4 text-start">Masuk untuk melamar lowongan</h2>
                            <p class="lead mb-5 text-start">Jika anda belum mempunyai akun, <a href="{{ route('register') }}" style="color: white;">daftar di sini</a></p>
                            <div class="text-endx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                    <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5" >
                    <div class="card border-0 rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h3 class="text-center">
                                            <i class="bi bi-arrow-bar-right"></i> Masuk
                                        </h3>
                                        <p class="text-center">E-Recruitment</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="row gy-3 overflow-hidden">
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                <label for="email" class="form-label">Email</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password" class="form-label">Password</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                <label class="form-check-label text-secondary" for="remember_me">
                    Ingat Saya
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 ">
            <div class=" d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-start mt-4">
                <a href="#!" style="text-decoration: none;">Lupa Kata Sandi?</a>
            </div>
        </div>
        <div class="col-6 ">
            <div class=" d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-arrow-bar-right"></i>Masuk</button>
            </div>
        </div>
    </div>
</form>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer></footer>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
