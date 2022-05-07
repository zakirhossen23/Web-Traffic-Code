@extends('layouts.app')

@section('title', 'My Websites')

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
                        <h5 class="card-header">My Websites 
                            <button type="button" class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#AddSiteModal" data-whatever="@mdo"><i class="fas fa-plus-circle"></i> Add a website</button>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Website URL</th>
                                            <th>Duration</th>
                                            <th>Hits Received</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                    @forelse($websites as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;"><a href="{{$data->url}}" target="_blank">{{$data->url}}</a></td>
                                            <td style="text-align: center;">{{$site->surf_time}}s</td>
                                            <td style="text-align: center;">{{$data->hits}}</td>
                                            <td style="text-align: center;"><span class="badge badge-{{$data->status == '0'  ? 'success' : 'info'}}">{{$data->status == '0'  ? 'Active' : 'Paused'}}</span></td>
                                            <td style="text-align: center;">
                                                <button href="#" id="editsite" class="btn btn-success btn-sm" data-toggle="modal" data-id="{{$data->id}}" data-target="#editSiteModal" title="Edit this website"><i class="fas fa-edit"></i></button>
                                                <button href="#" id="delsite" class="btn btn-danger btn-sm openDeleteSiteModal" data-toggle="modal" data-id="{{$data->id}}" data-target="#deleteSiteModal" title="Delete this website"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="10" style="text-align: center;">No matching records found.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="pagination"> {{ $websites->links() }} </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            You have <strong id="credits-total">{{ Auth::user()->credits }}</strong> available credits.
                            <a href="{{ url('/buy/credits') }}" class="btn btn-success ml-2"><i class="fas fa-shopping-cart"></i> Buy extra credits</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="AddSiteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="fas fa-plus-circle"></i> Add New Website</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addWebsite" method="POST" action="/websites/add">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-form-label">Website address (URL)</label>
                            <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}" placeholder="Enter website address (e.g. http://mywebsite.com)">
                            @if ($errors->has('url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                            <label for="credits" class="col-form-label">Credits</label>
                            <input type="text" class="form-control" id="credits" name="credits" value="{{ old('credits') }}" placeholder="credits">
                            @if ($errors->has('credits'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('credits') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="SelectStatus">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Enabled</option>
                                <option value="1">Disabled</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" form="addWebsite" class="btn btn-primary"><i class="fas fa-check"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSiteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="fas fa-link"></i> Edit Website @</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editWebsite" name="editWebsite" novalidate="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-form-label">Website address (URL)</label>
                            <input type="url" class="form-control" id="site_url" name="url" value="" placeholder="Enter website address (e.g. http://mywebsite.com)">
                            @if ($errors->has('url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                            <label for="credits" class="col-form-label">Credits</label>
                            <input type="text" class="form-control" id="site_credits" name="credits" value="" placeholder="credits">
                            @if ($errors->has('credits'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('credits') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="SelectStatus">Status</label>
                            <select class="form-control" id="site_status" name="status">
                                <option value="0">Enabled</option>
                                <option value="1">Disabled</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="site_id" name="site_id" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="saveEditWebsite" class="btn btn-primary"><i class="fas fa-check"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Delete Site -->
<div class="modal fade" id="deleteSiteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="modal-form" id="delete-site-form" action="#" autocomplete="off">
        {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Delete Website</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input name="site-id" type="hidden" value="0">
            <p>Are you sure you want to delete the following websites?</p>
                <span id="delete-site-url"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {

    //----- Delete Site -----//
    $("#delete-site-form").submit(function(e) {
        e.preventDefault();
        var site_id = $('#deleteSiteModal input[name="site-id"]').val();
        $.ajax({
            url: "/websites/delete/" + site_id,
            type: "POST",
            //dataType: 'json',
            data: {
                id: site_id,
                "_token": "{{ csrf_token() }}"
            },
            success: function (res) {
                $("#website" + site_id).remove();
                $('#deleteSiteModal').modal('hide');
            },
            error: function (res) {
                alert("button 2");
                console.log(res);
            }
        });
    });

    $('body').on('click','#delsite',function(e){
        e.preventDefault();
        var site_id = $(this).data("id");        
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/websites/delete/" + site_id,
            success: function (data) {
                console.log(data);
                $('#deleteSiteModal input[name="site-id"]').val(data.website.id);
                $("#delete-site-url").html(data.website.url);
            },
            error: function (data) {
                alert("button 1");
                console.log('Error:', data);
            }
        });
    });
    //----- get Site Info -----//
    $('body').on('click','#editsite',function(e){
        e.preventDefault();
        var site_id = $(this).data("id");        
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/websites/edit/" + site_id,
            success: function (data) {
                console.log(data);
                $('#site_id').val(data.website.id);
                $('#site_url').val(data.website.url);
                $('#site_credits').val(data.website.credits);
                $('#site_status').val(data.website.status);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //----- Update Site -----//
    $("#saveEditWebsite").click(function (e) {
        e.preventDefault(); 
        var site_id = $('#site_id').val();
        $.ajax({
            type: "POST",
            url: "/websites/edit/" + site_id,
            //dataType: "json",
            data: {
                url: $('#site_url').val(),
                credits: $('#site_credits').val(),
                status: $('#site_status').val(),
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                $('#editWebsite').trigger("reset");
                $('#editSiteModal').modal('hide');
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});

</script>
@endsection
