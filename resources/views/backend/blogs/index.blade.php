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
                    <h1 class="m-0">Blogs <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog Info</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
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
                                                <th>S.No</th>
                                                <th>Cover Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                {{-- <th>Post Type</th> --}}
                                                <th>Status</th>
                                                {{-- <th>Comments</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($blogs) == 0)
                                                <tr>
                                                    <td colspan="6">
                                                        <p class="text-center">
                                                            No any records.
                                                        </p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($blogs as $blog)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{$blog->cover_image}}" alt="{{ $blog->title }}" style="height: 90px; width: 150px;">
                                                        </td>
                                                        <td>
                                                            {{$blog->title}}
                                                        </td>
                                                        <td>
                                                            {{$blog->category->title}}
                                                        </td>
                                                        {{-- <td>
                                                            {{$blog->blog_type}}
                                                        </td> --}}
                                                        <td> @if($blog->publish_status==1)  <span class="badge badge-info">Active</span> @else <span class="badge badge-danger">Inactive</span>  @endif
                                                        </td>
                                                        {{-- <td>Total : {{ count($blog->comment) }} <a class="btn btn-primary btn-sm" @if(count($blog->comment)>0) href="{{ route('blogs.show',$blog->id)}}" @endif > <span class="fas fa-eye"></span></a> </td> --}}
                                                        <td>
                                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionservice{{ $blog->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                            <!-- Modal -->
                                                                <div class="modal fade text-left" id="deletionservice{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                                                                    @csrf
                                                                                    @method("POST")
                                                                                    <label for="reason">Are you sure you want to delete??</label><br>
                                                                                    <input type="hidden" name="_method" value="DELETE" />
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
                                                    Showing <strong>{{ $blogs->firstItem() }}</strong> to
                                                    <strong>{{ $blogs->lastItem() }} </strong> of <strong>
                                                        {{ $blogs->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $blogs->links() }}</span>
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
