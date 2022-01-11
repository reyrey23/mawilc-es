@extends('layouts.app')


@section('content')
<div class="main-content">
    <div class="header bg-gradient-success pb-5 pt-5 pt-md-8"> </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Create New Account</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ implode(', ', $data->role()->get()->pluck('name')->toArray()) }}</td>
                                    <td class="td-actions text-right">
                                            <a  class="btn btn-secondary btn-sm" href="{{ route('admin.user.edit', $data->id) }}">
                                                <i class="far fa-edit text-success"></i> Edit
                                            </a>

                                            <form action="{{ route('admin.user.destroy', $data) }}" method="POST" class="float-right">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-secondary btn-sm">
                                                    <i class="far fa-trash-alt text-danger"></i> Delete
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('accounts.add')
</div>
@endsection

