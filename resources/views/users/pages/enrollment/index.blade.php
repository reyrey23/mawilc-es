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
                                        <h2 class="mb-0 text-dark-green">STEP 1: STUDENT INFORMATION</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="container">
                                    <form action="{{ route('student.information.store','store') }}" method="POST" role="form">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" class="form-control" />

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  Name
                                                <input type="text" class="form-control text-dark" value="{{ auth()->user()->name }}" disabled />
                                              </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    Academic Level
                                                    <select class="form-control form-select text-dark" name="studentAcademicLevel">
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

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    Email
                                                    <input class="form-control text-dark" type="text" value="{{ auth()->user()->email }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    Number
                                                    <input  type="text" class="form-control" placeholder="{{ auth()->user()->number }}" name="studentNumber">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="card-footer py-2">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-success my-4">Proceed</button>
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

