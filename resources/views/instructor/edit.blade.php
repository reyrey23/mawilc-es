<div class="col-md-4">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
          <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">
                        <div class="text-muted text-center mt-2 mb-3"><h3>Edit Instructor</h3></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <form action="{{ route('instructor.update','edit') }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <input class="form-control" type="text" name="instructorID" id="instructorID">

                                <div class="col-md-12">
                                    <div class="text-muted"><Small class="text-danger">*</Small> Instructor Name </div>
                                    <div class="form-group">
                                        <div class="input-group md-10">
                                        <input class="form-control" type="text" name="instructorName" id="instructorName">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-muted"> Instructor Description </div>
                                    <div class="form-group">
                                        <div class="input-group md-10">
                                        <input class="form-control" type="text" name="instructorDescription" id="instructorDescription">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success my-4">update</button>
                                <button type="button" class="btn btn-danger my-4" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
