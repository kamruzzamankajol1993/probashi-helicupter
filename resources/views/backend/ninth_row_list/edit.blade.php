@extends('backend.master.master')

@section('title')
Update Video review Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Update Video review Information</h4>

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
                                          <input type="text" class="form-control form-control-sm" id="name" name="image" value="{{ $user->image }}" placeholder="Enter Address">

                                      </div>

                                      <div class="form-group col-md-12 col-sm-12">
                                          <label for="name">Description</label>
                                          <textarea  class="form-control form-control-sm" id="classic-editor" name="des" placeholder="Enter Description">{!! $user->des !!}</textarea>

                                      </div>


                                      <div class="form-group col-md-12 col-sm-12">
                                        <label for="name">status</label>
                                        <select required class="form-control form-control-sm selectTag"  name="status">
                                            <option value="">---Please Select---</option>
                                            <option value="Active" {{ $user->status == 'Active' ? 'selected':''  }}>Active</option>
                                            <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected':''  }}>Inactive</option>
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
                    </div> <!-- end row -->






<!--  Modal content for the above example -->



<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg456" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Video review Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

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







