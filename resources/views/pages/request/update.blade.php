<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-2">
                    <div class="text-muted text-center mt-2 mb-3"><h3>Alert</h3></div>
                </div>

                <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{ route('admin.enrollment.update','update') }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <input class="form-control" type="hidden" id="enrollmentID" name="enrollmentID">
                            <input class="form-control" type="hidden" id="enrollmentYear" name="enrollmentYear">
                            <input class="form-control" type="hidden" id="enrollmentStatus" name="enrollmentStatus">

                            <input class="form-control" type="hidden" id="user_id" name="user_id">
                            <input class="form-control" type="hidden" id="subjectID" name="subjectID">
                            <input class="form-control" type="hidden" id="subject_scheduleID" name="subject_scheduleID">

                            <h2 >Are sure you want to enroll this student? </h2>
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-success my-4">Yes</button>
                        <button type="button" class="btn btn-danger my-4" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
