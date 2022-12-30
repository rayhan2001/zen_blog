@extends('frontEnd.master')
@section('title')
    Contact
@endsection
@section('content')
    <main id="main">
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="page-title">Login</h1>
                        <h2>{{session('message')}}</h2>
                    </div>
                </div>

                <div class="form mt-2 col-md-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.add')}}" method="post" role="form" >
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="text" class="form-control" name="user_name" id="email" placeholder="Enter your email or phone" required>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary">Login</button></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End Contact Form -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
