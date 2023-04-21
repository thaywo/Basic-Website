@extends('admin.admin_slave')
@section('title', 'Forgot Password')
@section('content')
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('logo/pass.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset('logo/pass.png') }}"  height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                Enter Your <strong>E-mail</strong> and instructions will be sent to you!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email" id="email" required="" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
@endsection

