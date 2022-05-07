@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
.value {
    font-size:16px;
}
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Available Credits</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="value text-white stretched-link" href="{{ url('/buy/credits') }}">{{ Auth::user()->credits }}</a>
                            <div class="small text-white"><i class="fas fa-cubes fa-lg"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Account Type</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="value text-white stretched-link" href="#">Free</a>
                            <div class="small text-white"><i class="fas fa-leaf fa-lg"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Websites Slots</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="value text-white stretched-link" href="{{ url('/websites') }}">{{$used_slots}}/3</a>
                            <div class="small text-white"><i class="fas fa-link fa-lg"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Active Websites</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="value text-white stretched-link" href="{{ url('/websites') }}">{{$active_websites}}</a>
                            <div class="small text-white"><i class="fas fa-sync fa-spin fa-lg"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Credits Earned</div>
                        <div class="card-body"><canvas id="credits_earned" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Hits Received</div>
                        <div class="card-body"><canvas id="hits_received" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    var ctx = document.getElementById("credits_earned");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($graph_ticks) !!},
        datasets: [{
        label: "Credits Earned",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: {!! json_encode($graph_credits) !!},
        }],
    },
    options: {
        scales: {
            xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
                display: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            maxTicksLimit: 5
            },
            gridLines: {
            color: "rgba(0, 0, 0, .125)",
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });

    var ctx2 = document.getElementById("hits_received");
    var myLineChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: {!! json_encode($graph_ticks) !!},
        datasets: [{
        label: "Hits Received",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: {!! json_encode($graph_hits) !!},
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            maxTicksLimit: 5
            },
            gridLines: {
            color: "rgba(0, 0, 0, .125)",
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
    </script>
    
@endsection
