@extends('users.layouts.app')

@section('user-content')
<div class="main-content">
    <div class="header bg-secondary pb-6 pt-5 pt-md-4">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0 bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h2 class="mb-0 text-dark-green">STEP 2: SELECT SUBJECT</h2>
                                    </div>

                                    <div class="col-6 text-right">
                                        <select class=" form-select text-dark" name="enrollmentYear">
                                            <option value="Grade 0" selected>Grade 0</option>
                                            <option value="Grade 1">Grade 1</option>
                                            <option value="Grade 2">Grade 2</option>
                                            <option value="Grade 3">Grade 3</option>
                                            <option value="Grade 4">Grade 4</option>
                                            <option value="Grade 5">Grade 5</option>
                                            <option value="Grade 6">Grade 6</option>
                                            <option value="Grade 7">Grade 7</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('student.enrollment.store','store') }}" method="POST" role="form">
                                    @csrf
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Subject Code</th>
                                                    <th scope="col" class="sort" data-sort="name">Subject Description</th>
                                                    <th scope="col" class="sort" data-sort="status">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ( $subject as $key => $subject )
                                                    <tr>
                                                        <th>  
                                                            <div class="form-check">
                                                                <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                                                                <input type="hidden" class="form-control" name="subjectID[]" value="{{ $subject->subjectID }}">
                                                                <input class="form-check-input" type="checkbox" name="subject_scheduleID[]" value="{{ $subject->subject_scheduleID }}" id="flexCheckDefault" >
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    {{ $subject->subjectCode }}
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <td> {{ $subject->subjectDescription }}</td>
                                                        <td> {{ date('h:i A', strtotime($subject->subjectStartTime)) }} - {{ date('h:i A', strtotime($subject->subjectEndTime)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                            <div class="card-footer py-2">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-success my-4">Save</button>
                                        </div>
                                    </div>
                                </nav>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection