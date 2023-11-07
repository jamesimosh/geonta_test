@extends('dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Booked Adverts</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
          <table id="list_adversts" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Descprition</th>
                    <th>Guest name</th>
                    <th>Guest email</th>
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
                            <td>{{ $adv->name }}</td>
                            <td>{{ $adv->email }}</td>
                            <td>{{ $adv->status }}</td>
                            <td>{{ $adv->created_at }}</td>
                            <td>
                                <center>
                                <a class="btn btn-danger" href="" onclick="confirm('Are you sure you want to Inactivate this record?');">
                                    <i class="fa fa-times"></i>
                                    Inactivate
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