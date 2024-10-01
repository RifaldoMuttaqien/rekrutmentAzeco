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

<body class="bg-primary ">
    <header>
        <nav></nav>
    </header>

    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center text-bg-primary">
                        <div class="col-12 col-xl-10 text-center">
                            <img class="img-fluid rounded mb-4" loading="lazy" src="https://cdn-icons-png.flaticon.com/512/3271/3271534.png" width="345" height="80" alt="BootstrapBrain Logo">
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xl-5">
                    <div class="card border-0 rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h3 class="text-center">
                                        <i class="bi bi-file-earmark-plus"></i> Daftar
                                        </h3>
                                        <p class="text-center">E-Recruitment</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                            @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-6">
                                        <label for="firstName" class="form-label">Nama Depan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="First Name" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="firstName" class="form-label">Email ANda <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="First Name" required>
                                    </div>
                                   
                                    <div class="col-6">
                                        <label for="lastName" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="lastName" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="tanggal_lahir" id="	tanggal_lahir" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Nomor Whatsapp <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="nomor_wa" id="nomor_wa" placeholder="" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Role : <span class="text-danger">*</span></label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="applicant">applicant</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                     <div class="col-6">
                                     <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row">
                                
                                <div class="col-12">
                                    <div class=" d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                <p class="text-center">Sudah terdaftar? <a href="{{ route('login')}}">Masuk</a></p>
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