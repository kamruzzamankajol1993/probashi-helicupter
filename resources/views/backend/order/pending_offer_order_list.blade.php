@extends('backend.master.master')

@section('title')
Pending Offer Order List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pending Offer Order List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">


                        <div class="col-sm-6">
                            <div class="float-right d-md-block">

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-2">
                        @include('flash_message')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Order Number</th>
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




                                        <button type="button"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lgrree{{ $user->id }}"
                                            class="btn btn-success waves-light waves-effect  btn-sm" >
                                            <i class="fas fa-eye"></i></button>


                                                <!-- Modal -->
                                          <div class="modal fade bs-example-modal-lgrree{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Nid Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">

        <?php

$usersOrderUser = DB::table('users')->where('id',$user->user_id)->first();

                                    ?>

                                    @if(!$usersOrderUser)


                                    @else

<div class="row">

    <div class="col-md-12">
        <img src="{{ asset('/') }}{{ $usersOrderUser->nid_front }}" style="width:700px;">
    </div>

    <div class="col-md-12">
        <img src="{{ asset('/') }}{{ $usersOrderUser->nid_back }}" style="width:700px;">
    </div>

</div>
@endif

      </div>

    </div>
  </div>
</div>






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



<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('offer_order_delete',$user->id) }}" method="POST" style="display: none;">
@method('DELETE')
                                                    @csrf

                                                </form>

                                    </td>
                                </tr>
@endforeach


                                        </tbody>

                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->






<!--  Modal content for the above example -->



<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg456" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add News & Media Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.news_and_media.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">

                                      <div class="row">






                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control form-control-sm" id="name" name="title" placeholder="Enter Title">

                                        </div>
                  <div class="form-group col-md-12 col-sm-12">
                      <label for="name">Image</label>
                      <input type="file" class="form-control form-control-sm" id="name" name="image" placeholder="Enter Address">

                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label for="name">Link</label>
                    <input type="text" class="form-control form-control-sm"  id="name" name="des" placeholder="Enter Link">

                </div>












              </div>






                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">

                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>

                          </div>
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')

<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>


@endsection







