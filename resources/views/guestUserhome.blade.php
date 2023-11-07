@extends('welcome')

@section('content')
<div class="row">
    <div class="col-3 col-lg-3 col-md-3">
        @if ($categories)
            @foreach ($categories as $category)
                <a href="" class="col-12 badge badge-primary" style="margin-bottom: 5px; height: 50px;" onclick="getProducts({{ $category['id'] }});">
                    <h4 style="padding-top: 10px;">{{ $category['name'] }}</h4>
                </a>
            @endforeach
        @endif
    </div>
    <div class="col-9 col-lg-9 col-md-9">
        <div class="row fx-element-overlay">
            @if ($adverts)
                @foreach ($adverts as $p)
                    <div class="col-12 col-lg-3 col-xl-3 col-md-3">
                        <div class="box" onclick="passIDValue({{ $p->id }});" data-bs-toggle="modal" data-bs-target="#modal-center">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="{{ asset('/images/product/product02.jpg') }}" alt="user" class="bbsr-0 bber-0">
                                    <div class="fx-overlay scrl-up">						
                                        {{-- <ul class="fx-info">
                                            <li><a class="btn btn-outline" href="javascript:void(0);"><i class="mdi mdi-view"></i></a></li>
                                            <li><a class="btn btn-outline" href="javascript:void(0);"><i class="mdi mdi-add"></i></a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                                <div class="fx-card-content text-start">							
                                    <div class="product-text">
                                        <h4 class="text-blue">{{ $p->title }}</h4>
                                        <br>
                                        {{-- <h4 class="box-title mb-0">
                                            {{ $p->name }}
                                        </h4> --}}
                                        <small class="text-muted db">
                                            {{ $p->description }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->				  
                    </div>
                @endforeach
            @else
                <center><h4>No product.</h4></center>
            @endif          
        </div>
    </div>
</div>

<!-- Sales modal -->
<div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form enctype="multipart/form-data" id="formData" action="{{ route('advert.booking') }}" method="POST">
            <div class="modal-body">
                @csrf
                <input type="hidden" id="advertID" name="advertID"/>
                <div class="p-40"> 
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="integer" class="form-control ps-15 bg-transparent" placeholder="Enter Name" name="name" id="name">
                        </div>
                    </div>	
                    <div>
                        <p id="message"></p>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control ps-15 bg-transparent" placeholder="Enter Email" name="email" id="email">
                        </div>
                    </div>	
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary float-end" id="buy" onclick="booking();">Book</button>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- /.modal -->
@endsection

<script>
    let productVal = null;
    function passIDValue(productIDValue)
    {
        console.log(productIDValue);
        productVal = productIDValue;
        $('#advertID').val(productVal);
        
    }
</script>