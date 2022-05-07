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
                        <h5 class="card-header">Manage Websites</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th scope="col" style="text-align: center;">#</th>
											<th scope="col" style="text-align: center;">User</th>
											<th scope="col" style="text-align: center;">Website URL</th>
											<th scope="col" style="text-align: center;">Total Hits</th>
											<th scope="col" style="text-align: center;">Status</th>
											<th scope="col" style="text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                    @forelse($websites as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;">{{$data->id}}</td>
                                            <td><a href="/admin/users/edit/{{$data->user_id}}">{{$data->user->username}}</a></td>
										    <td><a href="/admin/websites/edit/{{$data->id}}">{{$data->url}}</a></td>
										    <td>{{$data->hits}}</td>
										    @if ($data->status == 0)
												<td><span class="badge badge-success">Active</span></td>
											@else
												<td><span class="badge badge-danger">Inactive</span></td>
											@endif
                                            <td style="text-align: center;">
												<a href="/admin/websites/edit/{{$data->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
												<a href="/admin/websites/delete/{{$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $websites->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
