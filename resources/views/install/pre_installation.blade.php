@extends('install.layout')

@section('content')
    <h2>1. Pre-Installation</h2>

    <div class="box">
        <p>Please make sure the PHP extensions listed below are installed.</p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Extensions</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requirement->checkSystemCompatibility() as $key => $value)
                        @if ($value["type"] == "extension")
                        <tr>
                            <td>{{ $value["name"] }}</td>

                            <td class="text-center">
                                <i class="fa fa-{{ $value['check'] ? 'check' : 'times' }}" aria-hidden="true"></i>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box">
        <p>Please make sure you have set the correct permissions for the directories listed below.</p>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Directories</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requirement->checkSystemCompatibility() as $key => $value)
                        @if ($value["type"] == "directory")
                        <<tr>
                            <td>{{ $value["name"] }}</td>

                            <td class="text-center">
                                <i class="fa fa-{{ $value['check'] ? 'check' : 'times' }}" aria-hidden="true"></i>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-buttons clearfix">
        <a href="{{ $requirement->satisfied() ? url('install/configuration') : '#' }}" class="btn btn-primary pull-right" {{ $requirement->satisfied() ? '' : 'disabled' }}>
            Continue
        </a>
    </div>
@endsection
