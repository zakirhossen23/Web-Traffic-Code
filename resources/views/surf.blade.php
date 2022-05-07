@extends('layouts.app')

@section('title', 'Earn Credits')

@section('extra_js')
    <script src="js/surf.js.old"></script>
@endsection

@section('content')
<script>
$(document).ready(function () {
    $("#surfButton").click(function(e) {
        
        e.preventDefault();

        var myWindow;
        var surfTimer;
        var counter;

        $("#surfButton").addClass("activeSurf");

        function openWin() {
            $.ajax({
                type: "GET",
                //dataType: 'json',
                url: "/session",
                cache: false,
                data: {
                    getSite: 1,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    var data = response;
                    var timer = data.time;
                    
                    myWindow = window.open(data.website.url, "Traffic Exchange", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width=800,height=600, top=100, left=400,"); 

                    surfTimer = setInterval(function(){
                        if (timer > 1) {
                            timer = timer - 1;
                            counter = (timer > 1) ? 'Seconds' : 'Second';
                            $('#surfButton').html('<i class="fas fa-sync fa-spinner fa-spin fa-fw"></i> '+timer+" "+counter);
                        } else {
                            $("#surfButton").html('<i class="fas fa-sync fa-spinner fa-spin fa-fw"></i> 0 '+ counter);
                            clearInterval(surfTimer);
                            $.ajax({
                                type: "POST",
                                url: "/session",
                                cache: false,
                                //dataType: 'json',
                                data: {
                                    complete: 1,
                                    sid: data.website.id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    alert(response);
                                    openWin();
                                }
                            });
                        }
                    }, 1000);
                }
            });
        }
        
        openWin();

        var timer = setInterval(function() {   
            if(myWindow.closed) {  
                clearInterval(timer);  
                $("#status").addClass("badge-danger").removeClass("badge-success").text("Inactive");
                $('#info').html('<div class="msg_error">The surfbar was stopped because its second window could not be found.</div>');
                $('#surfButton').html("<i class='fas fa-play'></i> Start");
                $("#surfButton").removeClass("activeSurf");
                clearInterval(surfTimer);
                myWindow = false;
            }  
        }, 1000);

    });
});
</script>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Surfbar</h5>
                        <div class="card-body">
                            <p>Launch the autosurf system and you will earn free credits from other members as long as the surf page is running.</p>
                            <button type="button" id="surfButton" class="btn btn-outline-primary btn-block"><i class="fas fa-play"></i> Start</button>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h5 class="card-header">Latest 5 visited websites</h5>
                        <div class="card-body">
                        <table id="previous_websites" class="table mb-0">
                                <tbody>
                                @foreach ($LastSurfedSites as $surfedSite)
                                    <tr>
                                        <td><a href="{{ $surfedSite->url }}" target="_blank">{{ $surfedSite->url }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">My Sessions</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IP address</th>
                                            <th>Credits earned</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{Request::getClientIp()}}</td>
                                            <td>{{number_format($credits_earned, 2)}}</td>
                                            <td><span id="status" class="badge badge-danger">Inactive</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </main>
    <script>
    $(document).ready(function () {
        $("#surfButton").click(function () { 
            if($("#status").hasClass("badge badge-danger"))
                $("#status").removeClass("badge-danger").addClass("badge-success").text("Running");                   
        });
    });
    </script>
@endsection