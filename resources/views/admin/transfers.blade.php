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
                        <h5 class="card-header">Credits Transfers</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th scope="col" style="text-align: center;">#</th>
											<th scope="col" style="text-align: center;">Sender</th>
											<th scope="col" style="text-align: center;">Receiver ID</th>
											<th scope="col" style="text-align: center;">Credits</th>
											<th scope="col" style="text-align: center;">Date</th>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                    @forelse($transfers as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;">{{$data->id}}</td>
                                            <td>{{$data->sender}}</td>
										    <td>{{$data->receiver}}</td>
										    <td>{{number_format($data->credits, 2)}} credits</td>
										    <td>{{$data->created_at}}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="pagination"> {{ $transfers->links() }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
