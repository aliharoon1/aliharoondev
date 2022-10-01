@extends('layouts.backend-master')
@section('styles')
@stop
@section('content')
    <h1 class="page-title"> Portfolios Details
        <small>Portfolios Detail & Modification</small>
    </h1>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Portfolios</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-right">
                            <a href="{{route('portfolio-details.create')}}" class="btn btn-info">Add New Portfolio Details</a>
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
                    <h4>List of all the Portfolio Details</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tblPortfolioDetails"
                                       class="table table-striped- table-bordered table-hover table-checkable">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>detail</th>
                                        <th>Image</th>
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
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tblPortfolioDetails').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{route('portfolio-details.index')}}",
                columns:[
                    {data:'id',name:'id'},
                    {data:'title',name:'title'},
                    {data:'detail',name:'detail'},
                    {data:'image',name:'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop
