@extends('layouts.app')

@section('title', 'Billing')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card mb-3">
                        <h5 class="card-header">Settings</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="/settings/account">Account</a></li>
                            <li class="list-group-item"><a href="/settings/billing">Billing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="card mb-3">
                        <h5 class="card-header">Payment history</h5>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Credits</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td colspan="10" style="text-align: center;">None</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
