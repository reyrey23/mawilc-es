
        
<div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">
                        <div class="text-muted text-center mt-2 mb-3"><h3>New Subject Schedule</h3></div>
                    </div>
    
                        <div class="card-body px-lg-5 py-lg-5">
                            <form action="{{ route('admin.enrollment.store','store') }}" method="POST" role="form">
                            @csrf
                                <div class="row">
                                    <input class="form-control" type="hidden" id="subjectID" name="subjectID">
                                    <input class="form-control" type="hidden" id="subject_scheduleID" name="subject_scheduleID">
                                    <input class="form-control" type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                                    <input class="form-control" type="hidden" id="student_enrolledStatus" name="student_enrolledStatus" value="2">

                                    <div class="col-md-12">
                                        <div class="text-muted">Message</div>
                                        <div class="form-group">
                                            <div class="input-group md-10">
                                                <textarea class="form-control" id="student_enrolledMessage" name="student_enrolledMessage" rows="7"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="text-center">
                                <button type="submit" class="btn btn-success my-4">Request</button>
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
