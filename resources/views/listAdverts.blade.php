@extends('dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Adverts</h3>
      <button class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-center"><i class="fa fa-plus"></i> Create Advert</button>
    </div>

    <!-- Add Advert modal -->
  <div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Advert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form enctype="multipart/form-data" action="{{ route('admin.advertscreate')}}" method="post">
            <div class="modal-body">
                <div class="p-40">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-transparent"><i class="ti-box"></i></span>
                                <input type="text" class="form-control ps-15 bg-transparent" placeholder="Title" name="title">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-transparent"><i class="ti-box"></i></span>
                                <textarea type="text" class="form-control ps-15 bg-transparent" placeholder="Description" name="description">
                                </textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary float-end">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- /.modal -->

 <!-- Add Advert modal -->
 <div class="modal center-modal fade" id="modal_update" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Advert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form enctype="multipart/form-data" action="{{ route('admin.advertsupdate')}}" method="post">
            <div class="modal-body">
                <div class="p-40">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="stude_id" id="stude_id">  
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-transparent"><i class="ti-box"></i></span>
                                <input type="text" class="form-control ps-15 bg-transparent" placeholder="Title" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-transparent"><i class="ti-box"></i></span>
                                <textarea type="text" class="form-control ps-15 bg-transparent" placeholder="Description" name="description" id="description">
                                </textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-end">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- /.modal -->

    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
          <table id="list_adversts" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Descprition</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($adverts)
                    @foreach ($adverts as $adv)
                        <tr>
                            <td>{{ $adv->title }}</td>
                            <td>{{ $adv->description }}</td>
                            <td>{{ $adv->status }}</td>
                            <td>{{ $adv->created_at }}</td>
                            <td>
                                <center>
                                <a class="btn btn-info" href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                &nbsp;   
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_update" onclick="editFunc('{{ $adv->id }}', '{{ $adv->title }}', '{{ $adv->description }}');">
                                    <i class="fa fa-edit"></i>
                                </button>
                                &nbsp;
                                &nbsp;
                                <a class="btn btn-danger" href="" onclick="confirm('Are you sure you want to delete this record?');">
                                    <i class="fa fa-times"></i>
                                </a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <center>
                        <h4>No record</h4>
                    </center>
                @endif
            </tbody>
          </table>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
  
  <script>
    $('#list_adversts').DataTable();
    function editFunc(stID, title, description)
    {
        $('#id').val(stID);
        $('#title').val(title);
        $('#description').val(description);
    }
  </script>
@endsection