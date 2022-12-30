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
                        <h1 class="page-title">Registration</h1>
                        <h2>{{session('message')}}</h2>
                    </div>
                </div>

                <div class="form mt-2 col-md-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.save')}}" method="post" role="form" >
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-success">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End Contact Form -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
