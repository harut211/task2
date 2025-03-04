<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>
                            @if(!empty($errors->first()))
                                <div class="mb-3" style="color: red">{{$errors->first()}}</div>
                            @endif

                            <form action="{{route('auth-login')}}" method="post">
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" name="login" id="login" class="form-control form-control-lg"><br>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="password"
                                           class="form-control form-control-lg">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a>
                                </p>

                                <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-outline-light btn-lg px-5"
                                        type="submit">Login
                                </button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>


