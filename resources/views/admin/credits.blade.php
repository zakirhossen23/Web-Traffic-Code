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
                        <h5 class="card-header">Manage Packages
							<a href="/admin/credits/addpack" class="btn btn-outline-secondary float-right"><i class="fas fa-plus-circle"></i> Add New Pack</a>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;">#</th>
											<th scope="col" style="text-align: center;">Name</th>
											<th scope="col" style="text-align: center;">Credits</th>
											<th scope="col" style="text-align: center;">Price</th>
											<th scope="col" style="text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                    @forelse($credits as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;">{{$data->id}}</td>
                                            <td>{{$data->name}}</td>
										    <td>{{$data->credits}} credits</td>
										    <td>{{$data->price}} USD</td>
                                            <td style="text-align: center;">
												<a href="/admin/credits/delete/{{$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-btn fa-times"></i> Remove</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
