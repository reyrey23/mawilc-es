<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">
                        <div class="text-muted text-center mt-2 mb-3"><h3>Select Subject</h3></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-2">
                        {{-- <form action="{{ route('student.enrolled.store','store') }}" method="POST" role="form"> --}}
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush add-subject">
                                        <thead class="thead-light ">
                                            <tr>
                                                <th scope="col">Subject Code</th>
                                                <th scope="col">Subject Description</th>
                                                <th scope="col">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ( $subject as $key => $subject )
                                                <tr>
                                                   <td>
                                                        <div class="form-check">
                                                            <input type="hidden" class="form-control" name="subjectID[]" value="{{ $subject->subjectID }}">
                                                            <input class="form-check-input" type="checkbox" name="subject_scheduleID[]" value="{{ $subject->subject_scheduleID }}" id="flexCheckDefault" >
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                {{ $subject->subjectCode }}
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td> {{ $subject->subjectDescription }}</td>
                                                    <td> {{ date('h:i A', strtotime($subject->subjectStartTime)) }} - {{ date('h:i A', strtotime($subject->subjectEndTime)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-success my-4" id="select" >Select</button>
                                <button type="button" class="btn btn-danger my-4" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>