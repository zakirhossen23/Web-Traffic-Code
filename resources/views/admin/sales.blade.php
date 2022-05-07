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
                        <h5 class="card-header">Sales</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th scope="col">TXN ID</th>
											<th scope="col">User</th>
											<th scope="col">Payment Method</th>
											<th scope="col">Amount</th>
											<th scope="col">Date</th>
											<th scope="col">Status</th>                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    </tbody>
                                </table>
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
