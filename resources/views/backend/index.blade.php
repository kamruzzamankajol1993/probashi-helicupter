@extends('backend.master.master')

@section('title')
Dashboard
@endsection


@section('body')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Dashboard</h4>

            @include('flash_message')
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">

                <div class="float-end mt-2">
                    <div id="total-revenue-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $totalOrderCount }}</span></h4>
                    <p class="text-muted mb-0">Total Order</p>
                </div>
                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"> since start
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart"> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $totalOrderCountP }}</span></h4>
                    <p class="text-muted mb-0">Total Pending Order</p>
                </div>
                <p class="text-muted mt-3 mb-0"> since start
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart"> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $allOffersCount }}</span></h4>
                    <p class="text-muted mb-0">Total Offer</p>
                </div>
                <p class="text-muted mt-3 mb-0"> since start
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="growth-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $allServiceCount }}</span></h4>
                    <p class="text-muted mb-0">Total Service</p>
                </div>
                <p class="text-muted mt-3 mb-0">since start
                </p>
            </div>
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->





<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Order</h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <th>SL</th>
                        <th>Order Id</th>
                        <th>Client Info</th>
                        <th>Offer Detail</th>
                        <th>Payment Detail</th>
                        <th>Order Status</th>
                      <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allPendingOffers as $user)


            <tr>
               <td>{{ $loop->index+1 }}</td>
               <td>{{$user->payment_id }}</td>
            <td>

                {{ $user->name }},<br>
                {{ $user->phone }},<br>
                {{ $user->address }}


            </td>

            <td>

                <?php

$usersOrder = DB::table('whyjoinuses')->where('id',$user->order_id)->first();

                ?>

                @if(!$usersOrder)


                @else


                <p class="mt-2"><span class="text-md font-bold text-[var(--color-primary)]">DEPARTURE </span>: {{$usersOrder->departure}}</p>
                <p class=""><span class="text-md font-bold text-[var(--color-primary)]">LANDING </span>: {{$usersOrder->landing}}</p>

                <p class="text-xl font-bold "><span class="text-md font-bold text-[var(--color-primary)]">OFFER RATE </span>:
                    {{$usersOrder->price}}</p>

                @endif


            </td>

            <td>

               Payment Type: {{ $user->payment_type }}, <br>


               Payment Status: {{ $user->status }}


            </td>

<td>
@if(empty($user->confirm_status))
Pending

                @else
{{ $user->confirm_status }}
                @endif
</td>

                <td>


<button type="button"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lgrr{{ $user->id }}"
                      class="btn btn-primary waves-light waves-effect  btn-sm" >
                      <i class="fas fa-pencil-alt"></i></button>


                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-lgrr{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('update_order_status') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
<div class="row">


    <input type="hidden" class="form-control form-control-sm" value="{{ $user->id }}" name="id" placeholder="Enter Name">






                                    </div>
                            <div class="row">

                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Payment status</label>
                                    <select required class="form-control form-control-sm "  name="status">
                                        <option value="">---Please Select---</option>
                                        <option value="Sucess" {{ $user->status == 'Sucess' ? 'selected':''  }}>Sucess</option>
                                        <option value="Failed" {{ $user->status == 'Failed' ? 'selected':''  }}>Failed</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Order status</label>
                                    <select required class="form-control form-control-sm "  name="confirm_status">
                                        <option value="">---Please Select---</option>
                                        <option value="Confirm" {{ $user->status == 'Confirm' ? 'selected':''  }}>Confirm</option>
                                        <option value="Cancel" {{ $user->status == 'Cancel' ? 'selected':''  }}>Cancel</option>
                                    </select>
                                </div>

    </div>






                        </div>

                    </div>
                </div>



                <div class="col-lg-12">

                                <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                   Update
                                </button>

                </div>
            </div> <!-- end col -->
        </form>
</div>

</div>
</div>
</div>





                </td>
            </tr>
@endforeach


                    </tbody>

                </table>

                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
