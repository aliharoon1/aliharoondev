@extends('layouts.backend-master')
@section('styles')
@stop
@section('content')
    <h1 class="page-title"> testimonials
        <small>testimonials Detail & Modification</small>
    </h1>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>testimonials</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-right">
                            <a href="{{route('testimonial.create')}}" class="btn btn-info">Add New testimonial</a>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h4>List of all the testimonials</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tblTestimonials"
                                       class="table table-striped- table-bordered table-hover table-checkable">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Testimonial Text</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--End Test--}}
    {{-- Delete Form Starts --}}
    {!! Form::open(['method' => 'delete', 'id' => 'deleteForm']) !!}
    {!! Form::hidden('id', null , ['id' => 'deleteId']) !!}
    {!! Form::close() !!}
    {{-- Delete Form Ends --}}
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tblTestimonials').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{route('testimonial.index')}}",
                columns:[
                    {data:'id',name:'id'},
                    {data:'name',name:'name'},
                    {data:'title',name:'title'},
                    {data:'testimonial_text',name:'testimonial_text'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            $(document).on('click', '.deleteTestimonial', function () {
                        var currentID = $(this).attr('data-id');
                        console.log('id',currentID);
                        swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!'
                        }).then(function (result) {
                            if (result.value) {
                                var delete_url = "{{route('testimonial.destroy', ':id')}}";
                                delete_url = delete_url.replace(':id', currentID);
                                $('#deleteForm').attr('action', delete_url);
                                $('#deleteForm')[0].submit();
                                swal.fire(
                                    'Deleted!',
                                    'Testimonial has been deleted.',
                                    'success'
                                )
                            }
                        }, currentID);
            });
        });
    </script>
@stop
