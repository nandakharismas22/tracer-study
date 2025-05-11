@include('layouts.dashboard.head')

<body data-layout="horizontal" data-layout-size="boxed">

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Bagikan Kuesioner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bagikan link kuesioner berikut ke alumni:</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="kuesionerUrl" value="{{ route('kuesioner') }}"
                            readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">
                            <i class="fas fa-copy"></i> Salin
                        </button>
                    </div>

                    <h5>Bagikan melalui:</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <button class="btn btn-primary" onclick="shareTo('facebook')">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                        <button class="btn btn-info" onclick="shareTo('twitter')">
                            <i class="fab fa-twitter"></i> Twitter
                        </button>
                        <button class="btn btn-success" onclick="shareTo('whatsapp')">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </button>
                        <button class="btn btn-primary" onclick="shareTo('telegram')">
                            <i class="fab fa-telegram"></i> Telegram
                        </button>
                        <button class="btn btn-secondary" onclick="shareTo('email')">
                            <i class="fas fa-envelope"></i> Email
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Dashboard</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">BKK Tracer Study</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer text-center">
                ©2025 Kelompok 7 PENGSI - UPNVJT
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.dashboard.tail')
