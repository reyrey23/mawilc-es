@extends('layouts.app')

@section('content')
    {{-- Main Content --}}
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-gradient-success py-5 pb-5">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            {{-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Instructor</a></li>
                              </ol>
                            </nav> --}}
                          </div>
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
                            {{-- Success --}}
                            @if (session()->exists('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text">
                                        <strong>
                                        {{ session('success') }}
                                        </strong>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Error --}}
                            @if (session()->exists('danger'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text">
                                        <strong>
                                        {{ session('danger') }}
                                        </strong>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Instructor</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Create New Instructor</a>
                                </div>
                            </div>
                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="number">#</th>
                                        <th scope="col" class="sort" data-sort="name">Name</th>
                                        <th scope="col" class="sort" data-sort="name">Description</th>
                                        <th scope="col" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ( $data as $key => $instructor )
                                        <tr>
                                            <th class="text-center">{{ ++$key}}</th>
                                            <td> {{ $instructor->instructorName }} </td>
                                            <td> {{ $instructor->instructorDescription }}</td>

                                            <td class="text-right">
                                                <button  class="btn btn-secondary  btn-sm" data-toggle="modal" data-target="#edit" data-all="{{ json_encode($instructor) }}">
                                                    <i class="far fa-edit text-success"></i> Edit
                                                </button>

                                                <form action="{{ route('instructor.destroy', $instructor) }}" method="POST" class="float-right">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="Submit" class="btn btn-secondary btn-sm">
                                                        <i class="far fa-trash-alt text-danger"></i> Delete
                                                    </button>
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
        </div>
    </div>

    @include('instructor.create')
    @include('instructor.edit')
   @include('instructor.script')

@endsection
