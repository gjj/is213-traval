@extends('partials.master')

@section('title')
Home @stop

@section('styles')
@endsection

@section('content')
<div class="hero-block hero-v6 bg-img-hero-bottom gradient-overlay-half-blue-gradient z-index-2 mb-6 mb-lg-14 mb-xl-17 pb-xl-2" style="background-image: url(assets/img/1920x750/img1.jpg);">
    <div class="container space-2 space-top-xl-4">
        <div class="justify-content-md-center py-xl-10">

            <div class="mb-lg-n16">
                <div class="col-md-6 offset-md-3">
                    <div class="card border-0 tab-shadow tab-shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sign in</h5>

                            <form method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection

@section('scripts')
@endsection