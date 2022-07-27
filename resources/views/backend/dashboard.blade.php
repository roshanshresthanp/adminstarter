@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$courses}}</h3>

                                    <p>Total courses</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <a href="{{route('courses.index')}}" class="small-box-footer">View courses <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{$destination}}</h3>

                                    <p>Total Destination</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document"></i>
                                </div>
                                <a href="{{route('destination.index')}}" class="small-box-footer">View Destination <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div> --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{$team}}</h3>

                                    <p>Total Team</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document"></i>
                                </div>
                                <a href="{{route('team.index')}}" class="small-box-footer">View Team <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$classes}}</h3>

                                    <p>Total Classes</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document"></i>
                                </div>
                                <a href="{{route('learns.index')}}" class="small-box-footer">View Classes <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div> --}}
                        <!-- ./col -->
                        {{-- <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $partners_count }}</h3>

                                <p>Total Partners</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('partner.index') }}" class="small-box-footer">View Partners <i class="fas fa-arrow-circle-right"></i></a>
                            </div> --}}
                        {{-- </div> --}}
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $blogs }}</h3>

                                <p>Total Blogs</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-blog"></i>
                            </div>
                            <a href="{{ route('blogs.index') }}" class="small-box-footer">View Blogs <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $users_count }}</h3>

                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">View Users <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <div class="card mt-2">
                        <div class="card-header border-transparent">
                          <div class="row">
                              <div class="col-md-9 text-center">
                                <h2>Latest Customer Messages</h2>
                              </div>
                              <div class="col-md-3 text-right">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                              </div>
                          </div>

                        </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table m-0 text-center">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Subject.</th>
                              <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @if (count($messages) == 0)
                                      <tr>
                                          <td colspan="4">
                                              No any messages.
                                          </td>
                                      </tr>
                                  @else
                                      @foreach ($messages as $message)
                                          <tr>
                                              <td>
                                                {{ $message->name }}
                                              </td>
                                              <td>
                                                {{ $message->email }}
                                              </td>
                                              <td>
                                                {{ $message->subject }}
                                              </td>
                                              <td>
                                                <a href="{{ route('message.show',$message->id) }}" class="btn btn-primary" title="View"><i class="fas fa-eye"></i></a>
                                              </td>
                                          </tr>
                                      @endforeach
                                  @endif
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix text-center">
                          <a href="{{ route('message.index') }}" class="btn btn-sm btn-info float-left">View all Messages</a>
                      </div>
                      <!-- /.card-footer -->
                    </div>

                    {{-- <div class="card mt-2">
                        <div class="card-header border-transparent">
                          <div class="row">
                              <div class="col-md-9 text-center">
                                <h2>Latest test Preparation Booking</h2>
                              </div>
                              <div class="col-md-3 text-right">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                              </div>
                          </div>

                        </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table m-0 text-center">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Contact no.</th>
                              <th>Destination</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @if (count($testBooking) == 0)
                                      <tr>
                                          <td colspan="4">
                                              No any Test preparation Booking.
                                          </td>
                                      </tr>
                                  @else
                                      @foreach ($testBooking as $message)
                                        @php
                                            $currentDestination = $destinations->whereIn('id',is_array($message->destination_id) ? $message->destination_id : [$message->destination_id]);
                                        @endphp
                                          <tr>
                                              <td>
                                                {{ $message->name }}
                                              </td>
                                              <td>
                                                {{ $message->email }}
                                              </td>
                                              <td>
                                                {{ $message->phone }}
                                              </td>
                                              <td>
                                                @foreach ($currentDestination as $item)
                                                            {{$item->title}}
                                                            @endforeach
                                              </td>
                                          </tr>
                                      @endforeach
                                  @endif
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix text-center">
                          <a href="{{ route('testbooking') }}" class="btn btn-sm btn-info float-left">View all Booking</a>
                      </div>
                      <!-- /.card-footer -->
                    </div> --}}

                      {{-- <div class="card mt-2">
                        <div class="card-header border-transparent">
                          <div class="row">
                              <div class="col-md-9 text-center">
                                <h2>Latest Active Plan </h2>
                              </div>
                              <div class="col-md-3 text-right">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                              </div>
                          </div>

                        </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table m-0 text-center">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Plan type</th>
                                <th>Regular price</th>
                                <th>Offer price</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @if (count($pricing) == 0)
                                      <tr>
                                          <td colspan="4">
                                              No any plan.
                                          </td>
                                      </tr>
                                  @else
                                      @foreach ($pricing as $price)
                                          <tr>
                                            <td>{{$price->title}}</td>
                                            <td>{{$price->plantype->title}}</td>
                                            <td>
                                                {{$price->regular_price}}
                                            </td>
                                            <td>
                                                {{$price->offer_price}}
                                            </td>
                                          </tr>
                                      @endforeach
                                  @endif
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix text-center">
                          <a href="{{ route('pricing.index') }}" class="btn btn-sm btn-info float-left">View all Pricing</a>
                      </div>
                      <!-- /.card-footer -->
                    </div> --}}
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->
@endsection
