<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('argon/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('argon/assets/img/favicon.png')}}">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{url('argon/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{url('argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{url('argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{url('argon/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('fe.layouts.sidebar')

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('fe.layouts.header')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Upload Data Diri</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('pelamar.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <hr class="horizontal dark">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-uppercase text-sm">Data Diri Information</p>
                                    </div>
                                    @foreach ($applicants as $applicantss)
                                    <div class="col d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end "> <a class="btn btn-info btn-sm" href="{{route('pelamar.show', $applicantss->id)}}">Lihat Data Diri</a></div>
                                    @endforeach
                                   


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="text-uppercase text-sm">Biodata Information</p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">ID</label>
                                                                <input class="form-control" type="text" value="{{$user->id}}" name="user_id">
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <hr class="horizontal dark">
                                                    <p class="text-uppercase text-sm">Upload Berkas</p>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Upload CV</label>
                                                                <input class="form-control @error('cv') is-invalid @enderror" type="file" name="cv">
                                                                @error('cv')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">KTP</label>
                                                                <input class="form-control @error('ktp') is-invalid @enderror" type="file" name="ktp">
                                                                @error('ktp')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Ijasah</label>
                                                                <input class="form-control @error('ijasah') is-invalid @enderror" type="file" name="ijasah">
                                                                @error('ijasah')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                                                @error('alamat')
                                                                <div class="alert alert-danger mt-2">bcv
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Telepon</label>
                                                                <input class="form-control @error('telepon') is-invalid @enderror" type="number" value="{{ old('telepon') }}" name="telepon">
                                                                @error('telepon')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="horizontal dark">
                                    <div class="col-md-12">
                                        <div class="d-flex gap-2 flex-column flex-md-row justify-content-md-end mt-4">
                                            <button class="btn btn-primary justify-end" type="submit">Submit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </main>

    <!-- Fixed Plugin -->
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"></i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{url('argon/assets/js/core/popper.min.js')}}"></script>
    <script src="{{url('argon/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{url('argon/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('argon/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard -->
    <script src="{{url('argon/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>