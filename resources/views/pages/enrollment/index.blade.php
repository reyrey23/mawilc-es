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
                            <div class="row">
                                <h3 class="mb-0">Enrollment   <small class="text-danger"> (Please select student) </small> </h3>
                              
                            </div>

                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="number">#</th>
                                        <th scope="col" class="sort" data-sort="name">Subject Code</th>
                                        <th scope="col" class="sort" data-sort="name">Subject Description</th>
                                        <th scope="col" class="sort" data-sort="status">Time</th>
                                        <th scope="col" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ( $data as $key => $student )
                                        <tr>
                                            <th class="text-center">{{ ++$key}}</th>
                                            <td> {{ $student->name }}</td>
                                            <td> {{ $student->email  }}</td>
                                            <td> {{ $student->number  }}</td>

                                            <td class="text-right">
                                                <a href="{{ route('admin.enrollment.show', $student->id) }}" class="btn btn-secondary btn-sm">
                                                    <i class="far fa-hand-point-right text-blue"></i> Select
                                                </a>
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
@endsection