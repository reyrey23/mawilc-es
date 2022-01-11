<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-2">
                    <div class="text-muted text-center mt-2 mb-3"><h3>Update Subject Schedule</h3></div>
                </div>

                <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{ route('schedule.subject.update','update') }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                        <div class="row">
                        <input class="form-control" type="hidden" id="subject_scheduleID" name="subject_scheduleID">
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
                                <input class="form-control" type="time" id="subjectStartTime" name="subjectStartTime">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted"> <Small class="text-danger">*</Small> End Time </div>
                            <div class="form-group">
                                <div class="input-group md-10">
                                <input class="form-control" type="time" id="subjectEndTime" name="subjectEndTime">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="text-center">
                        <button type="button" class="btn btn-danger my-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success my-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
