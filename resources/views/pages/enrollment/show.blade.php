@extends('layouts.app')

@section('content')
    {{-- Main Content --}}
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-gradient-success py-5 pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <div class="row">
                                <a href="{{ route('admin.enrollment.index') }}" class="btn btn-sm btn-icon btn-warning">
                                    <i class="fas fa-chevron-left"></i> BACK
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('admin.enrollment.store','store') }}" method="POST" role="form">
                        @csrf
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <input class="form-control" name="enrollmentStatus[]" type="hidden" value="1">
                                        <input class="form-control" name="user_id" type="hidden" value="{{ $data[0]->id }}">
                                        
                                        <div class="col-md-3">
                                            <div class="text-dark"> Name </div>
                                            <div class="form-group">
                                                <div class="input-group md-10">
                                                <input class="form-control text-dark"  type="text" value="{{ $data[0]->name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="text-dark"> Email </div>
                                            <div class="form-group">
                                                <div class="input-group md-10">
                                                <input class="form-control text-dark" type="text" value="{{ $data[0]->email }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="text-dark"> Number </div>
                                            <div class="form-group">
                                                <div class="input-group md-10">
                                                <input class="form-control text-dark"  type="text" value="{{ $data[0]->number }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col float-right">
                                            <div class="text-dark"> Option </div>
                                            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#add">
                                                <i class="fas fa-plus-circle"></i> Add Subject
                                            </a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                            <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush create-table" id="data-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="number">#</th>
                                                <th scope="col" class="sort" data-sort="name">Subject Code</th>
                                                <th scope="col" class="sort" data-sort="name">Subject Description</th>
                                                <th scope="col" class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr id="row">

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row float-right">
                                    <button type="submit" class="btn btn-success my-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.enrollment.create')
    </div>
@endsection

@section('script')
@include('pages.enrollment.script')

@endsection