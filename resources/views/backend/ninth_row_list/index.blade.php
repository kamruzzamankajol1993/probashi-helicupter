@extends('backend.master.master')

@section('title')
Video Review Info| {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Video Review Info</h4>

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
                                    @if (Auth::guard('admin')->user()->can('videoReviewAdd'))

                                    <a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light"  href="{{ route('admin.video_review_part.create') }}">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add
    </a>
                                                                          @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">

                        </div>
                    </div>
                    <!-- end page title -->
                    @include('flash_message')
                    <div class="row mt-2">
                        <!--start slider table -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Video Review</div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Video</th>
                                            <th>Title</th>
                                            <th>status</th>
                                          <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employee_list as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>
                                <td>


                                    <iframe width="360" height="180" src="{{ $user->image }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                                </td>

                                <td>{{$user->title }}</td>

<td>{!! $user->status !!}</td>



                                    <td>

                                        @if (Auth::guard('admin')->user()->can('videoReviewView'))

                                        <button type="button"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lgrree{{ $user->id }}"
                                            class="btn btn-success waves-light waves-effect  btn-sm" >
                                            <i class="fas fa-eye"></i></button>


                                                <!-- Modal -->
                                          <div class="modal fade bs-example-modal-lgrree{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Video review Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">

        {!! $user->des !!}


      </div>

    </div>
  </div>
</div>



                                        @endif
                                      @if (Auth::guard('admin')->user()->can('videoReviewUpdate'))



                                          <a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light"  href="{{ route('admin.video_review_part.edit',$user->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
        </a>


                                          <!-- Modal -->
                                          <div class="modal fade bs-example-modal-lgrr{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Video review  Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form class="custom-validation" action="{{ route('admin.video_review_part.update') }}" method="post" enctype="multipart/form-data">
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
                                                        <label for="name">Title</label>
                                                        <input type="text" class="form-control form-control-sm" value="{{ $user->title }}" id="name" name="title" placeholder="Enter Title">

                                                    </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Video Link</label>
                                <input type="file" class="form-control form-control-sm" id="name" name="image" value="{{ $user->image }}" placeholder="Enter Address">

                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Description</label>
                                <textarea  class="form-control form-control-sm" id="classic-editor" name="des" placeholder="Enter Description">{!! $user->des !!}</textarea>

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


@endif






                                  @if (Auth::guard('admin')->user()->can('videoReviewDelete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.video_review_part.delete',$user->id) }}" method="POST" style="display: none;">

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
                        </div> <!-- end col -->
                        <!--end slider table -->

                    </div> <!-- end row -->






<!--  Modal content for the above example -->

  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Employee Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.video_review_part.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">

                                      <div class="row">







                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control form-control-sm" value="" id="name" name="title" placeholder="Enter Title">

                                        </div>

                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">Designation</label>
                                            <input type="text" class="form-control form-control-sm" value="" id="name" name="desig" placeholder="Enter Designation">

                                        </div>

                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="name">Review</label>
                                            <textarea  class="form-control form-control-sm"  name="des" placeholder="Enter Description"></textarea>

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







