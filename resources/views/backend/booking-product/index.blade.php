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
                    <h1 class="m-0">Product Bookings 
                        {{-- <a href="{{ route('booking.create') }}" class="btn btn-primary">Add Booking</a></h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Booking</li>
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
                        <div class="col-md-12 ">
                            <div class="m-0 float-right">
                                {{-- <form class="form-inline" action="" method="POST">
                                    @csrf
                                    <div class="form-group mx-sm-3 mb-2">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button>
                                </form> --}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Product category</th>
                                                <th>Price</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($bookings) == 0)
                                                <tr>
                                                    <td colspan="6">
                                                        <p class="text-center">
                                                            No any records.
                                                        </p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($bookings as $Booking)
                                                    <tr>
                                                        <td>{{$Booking->name}}</td>
                                                        <td>{{$Booking->email}}</td>
                                                        <td>{{$Booking->address}}</td>
                                                        <td>{{$Booking->product_type}}</td>
                                                        <td>{{$Booking->product_price}}</td>
                                                        {{-- <td>
                                                            @if ($Booking->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td> --}}
                                                        <td>
                                                            {{-- <a href="{{ route('booking.edit', $Booking->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a> --}}
                                                            <a href="{{ route('booking-product.show', $Booking->id) }}" class="btn btn-primary" title="View"><i class="fas fa-eye"></i></a>

                                                            {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionservice{{ $Booking->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                            <!-- Modal -->
                                                                <div class="modal fade text-left" id="deletionservice{{ $Booking->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <form action="{{ route('booking.destroy', $Booking->id) }}" method="POST" style="display:inline-block;">
                                                                                    @csrf
                                                                                    @method("POST")
                                                                                    <label for="reason">Are you sure you want to delete??</label><br>
                                                                                    <input type="hidden" name="_method" value="DELETE" />
                                                                                    <button type="submit" class="btn btn-danger" title="Delete">Confirm Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
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
                                                    Showing <strong>{{ $bookings->firstItem() }}</strong> to
                                                    <strong>{{ $bookings->lastItem() }} </strong> of <strong>
                                                        {{ $bookings->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $bookings->links() }}</span>
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
<script>
$(document).ready(function(){
    $(#search.on('input')){
        var search = $(this).value();
        console.log(search);
    }
});
</script>
@endpush
