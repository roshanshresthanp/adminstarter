@extends('backend.layouts.app')
@push('styles')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Partners <a href="{{ route('partner.create') }}" class="btn btn-primary">Add New Partner</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Partners</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

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
                                                <th>S.No.</th>
                                                <th>Partner Logo</th>
                                                <th>Partner Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($partners) == 0)
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="text-center">
                                                            No any records.
                                                        </p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($partners as $partner)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{$partner->partner_logo}}" alt="{{ $partner->partner_name }}" style="height: 150px; width: 150px;">
                                                        </td>

                                                        <td>
                                                            {{$partner->partner_name}}
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionservice{{ $partner->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                            <!-- Modal -->
                                                                <div class="modal fade text-left" id="deletionservice{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                @php
                                                                                    $deleteurl = route('partner.destroy', $partner->id);
                                                                                @endphp
                                                                                <form action="{{ $deleteurl }}" method="POST" style="display:inline-block;">
                                                                                    @csrf
                                                                                    @method("DELETE")
                                                                                    <label for="reason">Are you sure you want to delete??</label><br>
                                                                                    <button type="submit" class="btn btn-danger" title="Delete">Confirm Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                ";
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-sm">
                                                    Showing <strong>{{ $partners->firstItem() }}</strong> to
                                                    <strong>{{ $partners->lastItem() }} </strong> of <strong>
                                                        {{ $partners->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $partners->links() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')

@endpush
