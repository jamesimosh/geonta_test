@extends('login')
@section('content')
<div class="col-lg-5 col-md-5 col-12">
    <div class="bg-white rounded10 shadow-lg">
        <div class="content-top-agile p-20 pb-0">
            <h2 class="text-primary">Let's Get Started</h2>
            <p class="mb-0">Sign in for maintenance.</p>							
        </div>
        <div class="p-40">
            <form enctype="multipart/form-data" action="{{ route('loginPost')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                        <input type="email" class="form-control ps-15 bg-transparent" placeholder="email@email.com" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                        <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
                    </div>
                </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" >
                        <label for="basic_checkbox_1">Remember Me</label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                     <div class="fog-pwd text-end">
                        <a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-primary mt-10">SIGN IN</button>
                    </div>
                    <!-- /.col -->
                  </div>
            </form>	
           
        </div>						
    </div>
</div>
@endsection