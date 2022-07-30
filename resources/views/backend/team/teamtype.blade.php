@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Team category <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Team category</button> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Team category</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
           <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Team Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('teamType.create') }}" method="post">
            @csrf
            @method('POST')
        <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="facebook">Team Category Title</label>
                        <input type="text" value="{{ old('name') }}" required name="name" placeholder="Enter team category tile" class="form-control">
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>

      </div>
    </div>
  </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="col-sm-12">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="col-sm-12">
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 15px">S.No.</th>
                                                <th>Team type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($teams) == 0)
                                                <tr>
                                                    <td colspan="5">
                                                        <p class="text-center">
                                                            No any team category.
                                                        </p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($teams as $teamType)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$teamType->name}}
                                                        </td>
                                                        <td>@if($teamType->status==1) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif </td>
                                                        <td>

                                                        <form action="{{ route('teamType.destroy', $teamType->id) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')" title="Delete"><span class="fas fa-trash"></span></button>
                                                        </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    {{-- <div class="mt-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-sm">
                                                    Showing <strong>{{ $teams->firstItem() }}</strong> to
                                                    <strong>{{ $teams->lastItem() }} </strong> of <strong>
                                                        {{ $teams->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $teams->links() }}</span>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->

    <!-- Button trigger modal -->

@endsection

