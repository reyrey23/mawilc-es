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
                                <a href="{{ route('schedule.subject.index') }}" class="btn btn-sm btn-icon btn-warning">
                                    <i class="fas fa-chevron-left"></i>  BACK
                                </a>

                                <div class="col text-right">
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Add Subject</a>
                                </div>
                            </div>

                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort">#</th>
                                        <th scope="col" class="sort" data-sort="name">Subject Code</th>
                                        <th scope="col" class="sort" data-sort="name">Description</th>
                                        <th scope="col" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ( $data as $key => $subject )
                                        <tr>
                                            {{-- <th class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="Datacheckbox">
                                                    <label class="form-check-label" for="Datacheckbox"> </label>
                                                  </div>
                                            </th> --}}
                                            <th>{{ ++$key }}</th>

                                            <td> {{ $subject->subjectCode }}</td>
                                            <td> {{ $subject->subjectDescription }}</td>

                                            <td class="text-right">
                                                <button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#assign" data-all="{{ json_encode($subject) }}">
                                                    <i class="far fa-edit text-primary"></i> Select
                                                </button>
                                                
                                                <button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit" data-all="{{ json_encode($subject) }}">
                                                    <i class="far fa-edit text-success"></i> Edit
                                                </button>

                                                <form action="{{ route('subject.destroy', $subject->subjectID) }}"  method="POST" class="float-right">
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
        {{-- Add Subject --}}
        @include('subject.create')
        
        {{-- Assign Subject Schedule --}}
        <div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-2">
                                <div class="text-muted text-center mt-2 mb-3"><h3>New Subject Schedule</h3></div>
                            </div>
        
                            <div class="card-body px-lg-5 py-lg-5">
                                <form action="{{ route('schedule.subject.store','store') }}" method="POST" role="form">
                                @csrf
                                    <div class="row">
                                    <input class="form-control" type="hidden" id="subjectID" name="subjectID">

                                    <div class="col-md-6">
                                        <div class="text-muted"><Small class="text-danger">*</Small> Subject Code </div>
                                        <div class="form-group">
                                        <div class="input-group md-10">
                                            <input class="form-control" type="text" id="subjectCode" disabled>
                                        </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="text-muted"> <Small class="text-danger">*</Small> Subject Description </div>
                                        <div class="form-group">
                                            <div class="input-group md-10">
                                                <input class="form-control" type="text" id="subjectDescription" disabled>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="text-muted"> <Small class="text-danger">*</Small> Start Time </div>
                                        <div class="form-group">
                                            <div class="input-group md-10">
                                            <input class="form-control" type="time" name="subjectStartTime">
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="text-muted"> <Small class="text-danger">*</Small> End Time </div>
                                        <div class="form-group">
                                            <div class="input-group md-10">
                                            <input class="form-control" type="time" name="subjectEndTime">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
        
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-success my-4">Save</button>
                                    <button type="button" class="btn btn-danger my-4" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END MODAL --}}
    </div>

    @include('pages.subject.script')
@endsection