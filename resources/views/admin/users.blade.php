@extends('admin.layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(Session::has('success_msg'))
                        <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                    @endif
                    @if(Session::has('error_msg'))
                        <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                    @endif
                    <div class="card mb-3">
                        <h5 class="card-header">Manage Users 
							<a href="/admin/users/add" class="btn btn-outline-secondary float-right"><i class="fas fa-plus-circle"></i> Add New User</a>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;">#</th>
											<th scope="col" style="text-align: center;">Username</th>
                                            <th scope="col" style="text-align: center;">Email</th>
											<th scope="col" style="text-align: center;">Credits</th>
											<th scope="col" style="text-align: center;">Type</th>
											<th scope="col" style="text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                    @forelse($users as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;">{{$data->id}}</td>
                                            <td>{{$data->username}}</td>
                                            <td>{{$data->email}}</td>
										    <td>{{$data->credits}}</td>
										    @if ($data->userlevel == 1)
												<td> <b>Admin</b></td>
											@else
												<td> User </td>
											@endif
                                            <td style="text-align: center;">
												<a href="/admin/users/edit/{{$data->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
												<a href="/admin/users/delete/{{$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
