@extends('layouts.app')

@section('title', 'Referrals')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Referrals</h5>
                        <div class="card-body">
                        <p>Share your referral link and earn {{$site->ref_credits}} credits for each user that sign up to our site.</p>
                        <h4>Referral link</h4>
                        <div class="input-group mb-3">
                            <input type="url" class="form-control" id="ref" readonly="readonly" value="{{ url('/') . '/ref/' . Auth::user()->id }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-copy" data-clipboard-action="copy" data-clipboard-target="#ref" type="button"><i class="fas fa-clipboard"></i> Copy</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h5 class="card-header">My Referrals</h5>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($referrals as $referral)
                                    <tr>
                                        <td> {{$referral->id}} </td>
                                        <td> {{$referral->username}} </td>
                                        <td> {{$referral->created_at}}</td>
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
                <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Banners</h5>
                        <div class="card-body">
                            <h5>Banner #1 (468x60)</h5>
                            <div class="text-center">
                                <img src="{{ URL::to('/') }}/images/banner-468x60.png" border="0" class="img-fluid">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">HTMl Code</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><a href="{{ url('/') . '/ref/' . Auth::user()->id }}" target="_blank"><img src="{{ URL::to('/') }}/images/banner-468x60.png" alt="Free website traffic" border="0" /></a></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">BB Code</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">[url={{ url('/') . '/ref/' . Auth::user()->id }}][img]{{ URL::to('/') }}/images/banner-468x60.png[/img][/url]</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </main>
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script>
    var clipboard = new ClipboardJS('.btn-copy');

    $('.btn-copy').hover(function () {
        $(this).tooltip('destroy');
    });

    clipboard.on('success', function(e) {
        $('.btn-copy').tooltip('hide').attr('data-original-title', 'Copied!').tooltip('show');
        setTimeout(function() {
            $('.btn-copy').tooltip('hide');
        }, 1000);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
@endsection
