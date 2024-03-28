@extends('backend.master.master')

@section('title')
Offer List| {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Offer List</h4>

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
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('offerAdd'))

<a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light"  href="{{ route('admin.our_running_offer.create') }}">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add
</a>
                                                                      @endif

                                </div>
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
                                            <th>Image</th>
<th>Departure</th>
<th>Landing</th>
<th>Fly Date</th>
<th>End Date</th>
<th>Price</th>

                                          <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($why_join_list as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>
                                <td><img src="{{ asset('/') }}{{ $user->image }}" style="height:150px;"/></td>

                                <td>{{$user->departure }}</td>
                                <td>{{$user->landing }}</td>

<td>{{ date('d F, Y', strtotime($user->fly_date)) }}</td>

<td>{{ date('d F, Y', strtotime($user->end_date)) }}</td>
<td>{{$user->price }}</td>
                                    <td>

                                      @if (Auth::guard('admin')->user()->can('offerUpdate'))

                    <a type="button"  href="{{ route('admin.our_running_offer.edit',$user->id ) }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></a>





@endif






                                  @if (Auth::guard('admin')->user()->can('offerDelete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.our_running_offer.delete',$user->id) }}" method="POST" style="display: none;">

                                                    @csrf


                                                </form>
                                                @endif
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
                <h5 class="modal-title" id="myLargeModalLabel">Add Offer Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.our_running_offer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">

                                    <div class="row">


                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">Departure</label>
                                            <input type="text" class="form-control form-control-sm"  id="name" name="departure" >

                                        </div>

                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">Landing</label>
                                            <input type="text" class="form-control form-control-sm"  id="name" name="landing" >

                                        </div>

                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="name">Fly Date</label>
                                            <input type="text" required class="form-control form-control-sm datepicker"  name="fly_date"/>

                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="name">End  Date</label>
                                            <input type="text" required class="form-control form-control-sm datepicker"  name="end_date"/>

                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="name">Price</label>
                                            <input type="text" required class="form-control form-control-sm"  name="price"/>

                                        </div>


                <div class="form-group col-md-12 col-sm-12">
                    <label for="name">Image</label>
                    <input type="file" class="form-control form-control-sm" id="name" name="image" placeholder="Enter Address">

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






