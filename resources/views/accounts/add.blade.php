<div class="col-md-4">
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
          <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">
                        <div class="text-muted text-center mt-2 mb-3"><h3>Add Account</h3></div>
                    </div>

                    <div class="card-body px-lg-5 py-lg-3">
                      <form role="form" method="POST" action="{{ route('admin.user.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                  <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-hat-3 text-primary"></i></span>
                                      </div>
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                  </div>
                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                  <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-email-83 text-primary"></i></span>
                                      </div>
                                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                  </div>
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button text-primary"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" maxlength="14" placeholder="0912345698712" type="text" name="number" value="{{ old('number') }}"  required>
                                </div>
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                  <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-lock-circle-open text-primary"></i></span>
                                      </div>
                                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password" name="password" required>
                                  </div>
                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-lock-circle-open text-primary"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                  <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-badge     text-primary"></i></span>
                                      </div>
                                      {{-- <input class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Role') }}" type="text" name="role" value="{{ old('role') }}" required> --}}
                                      <select class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" type="text" name="role" value="{{ old('role') }}" required id="role">
                                          <option value="Admin">Admin</option>
                                          <option selected value="Student">Student</option>
                                          <option selected value="Instructor">Instructor</option>
                                        </select>
                                  </div>
                                  @if ($errors->has('role'))
                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                          <strong>{{ $errors->first('role') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                              </div>
                            </div>
                          </div>
                      </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>
