<div class="col-md-4">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
          <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">
                        <div class="text-muted text-center mt-2 mb-3"><h3>Create New Subject</h3></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <form action="{{ route('subject.update','edit') }}" method="POST">
                        @csrf
                        @method('PUT')
                          <div class="row">
                            <input class="form-control" type="hidden" name="subjectID" id="subjectID">

                            <div class="col-md-12">
                              <div class="text-muted"><Small class="text-danger">*</Small> Subject Code </div>
                              <div class="form-group">
                                <div class="input-group md-10">
                                  <input class="form-control" type="text" name="subjectCode" id="subjectCode">
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="text-muted"> <Small class="text-danger">*</Small> Subject Description </div>
                              <div class="form-group">
                                <div class="input-group md-10">
                                  <input class="form-control" type="text" name="subjectDescription" id="subjectDescription">
                                </div>
                              </div>
                            </div>
                          </div>

                            <div class="text-center">
                              <button type="submit" class="btn btn-success my-3">Save</button>
                              <button type="button" class="btn btn-danger my-3 " data-bs-dismiss="modal">Cancel</button>
                            </div>
                          
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
