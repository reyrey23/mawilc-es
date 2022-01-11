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
                                <h3 class="mb-0">Subject Schedule
                                    @can('request')
                                    <small class="text-warning">(Choose subject you want to enroll)</small>
                                    @endcan
                                </h3>

                                <div class="col text-right">
                                    @can('add')
                                    <a href="{{ route('schedule.subject.create') }}" class="btn btn-sm btn-primary">Add Subject Schedule</a>
                                    @endcan
                                </div>
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
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col" class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ( $data as $key => $subject )
                                        <tr>
                                            <th class="text-center">{{ ++$key}}</th>
                                            <td> {{ $subject->subjectCode }}</td>
                                            <td> {{ $subject->subjectDescription }}</td>
                                            <td> {{ date('h:i A', strtotime($subject->subjectStartTime)) }} - {{ date('h:i A', strtotime($subject->subjectEndTime)) }}</td>
                                            
                                            @if ($subject->subjectStatus > 1)
                                                <td> Deactivated </td>
                                            @else
                                                <td> Activated </td>
                                            @endif

                                            <td class="text-right">
                                                @can('edit')
                                                <button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit" data-all="{{ json_encode($subject) }}">
                                                    <i class="far fa-edit text-success"></i> Edit
                                                </button>
                                                @endcan

                                                @can('delete')
                                                <form action="{{ route('schedule.subject.destroy', $subject->subject_scheduleID) }}"  method="POST" class="float-right">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="Submit" class="btn btn-secondary btn-sm">
                                                        <i class="far fa-trash-alt text-danger"></i> Delete
                                                    </button>
                                                </form>
                                                @endcan

                                                @can('request')
                                                    <button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#request" data-all="{{ json_encode($subject) }}">
                                                        <i class="fas fa-envelope text-primary"></i> Request
                                                    </button>
                                                @endcan

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

        @include('pages.subject.edit')
        @include('pages.subject.request')
        @include('pages.subject.script')
    </div>
@endsection