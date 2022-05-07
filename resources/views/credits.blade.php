@extends('layouts.app')

@section('title', 'Buy Credits')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card">
                        <div class="card-header">Buy Credits</div>
                        <table class="card-table table">
                            <tbody>
                            @foreach($credits as $data)
                                <tr>
                                    <td class="pl-4 pt-3"><strong>{{$data->name}}</strong> credits</td>
                                    <td class="text-left pt-3">${{$data->price}} USD</td>
                                    <td class="text-center">
                                        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{ route('paypal') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="item_name" value="{{$data->name}}">
                                            <input type="hidden" name="item_number" value="{{$data->credits}}">
                                            <input type="hidden" name="amount" value="{{$data->price}}"> 
                                            <button class="btn btn-success btn-block">Buy</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
