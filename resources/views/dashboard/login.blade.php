@include('layouts.dashboard.head')

<!-- Begin page -->
<div class="accountbg"></div>
<div class="account-pages mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/img/logo.png')}}" width="80" class="auth-logo logo-dark mx-auto">
                        <h4 class="font-size-18 text-center">Selamat Datang!</h4>
                        <div class="p-3">

                            <form class="form-horizontal" action="{{route('login')}}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter password">
                                </div>

                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                    type="submit">Masuk</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.tail')
