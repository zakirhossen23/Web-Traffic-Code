@extends('layouts.app')

@section('title', 'My Websites')

@section('content')

<head>
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Tailwind css style  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9ELYPM75M4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9ELYPM75M4');
</script>
</head>
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
                        <h5 class="card-header font-bold">My Websites
                            <button type="button" class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#AddSiteModal" data-whatever="@mdo"><i class="fas fa-plus-circle"></i> Add
                                a website</button>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="font-bold">Website URL</th>
                                            <th class="font-bold">Visit Duration</th>
                                            <th class="font-bold">Hits Limit</th>
                                            <th class="font-bold">Hits Received</th>
                                            <th class="font-bold">Status</th>
                                            <th class="font-bold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="websites-list" name="websites-list">
                                        @forelse($websites as $data)
                                        <tr id="website{{$data->id}}" class="active">
                                            <td style="text-align: center;"><a href="{{$data->url}}" target="_blank">{{$data->url}}</a></td>
                                            <td style="text-align: center;">{{$data->duration}}s</td>
                                            <td style="text-align: center;"><? if ($data->totalhits == -1) { ?>Until i have credits<? } else {
                                                                                                                                    echo $data->totalhits;
                                                                                                                                } ?></td>
                                            <td style="text-align: center;">{{$data->hits}}</td>
                                            <td style="text-align: center;"><span class="badge badge-{{$data->status == '0'  ? 'success' : 'info'}}">{{$data->status == '0'  ? 'Active' : 'Paused'}}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                <button href="#" id="editsite" class="btn btn-success btn-sm" data-toggle="modal" data-id="{{$data->id}}" data-target="#editSiteModal" title="Edit this website"><i class="fas fa-edit"></i></button>
                                                <button href="#" id="delsite" class="btn btn-danger btn-sm openDeleteSiteModal" data-toggle="modal" data-id="{{$data->id}}" data-target="#deleteSiteModal" title="Delete this website"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" style="text-align: center;">No matching records found.</td>
                                        </tr>
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
                            <div>
                                <div id="url_place">
                                    <div class="flex gap-3">
                                        <input type="url" class="form-control" id="url" name="url[0]" value="{{ old('url') }}" placeholder="Enter website address (e.g. http://mywebsite.com)">
                                        <button id="delete_Website" class="flex w-[52px] h-10 border border-gray-400 bg-gray-200 rounded-md justify-center items-center hover:bg-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" id="add_website" class="h-10 mt-2 mb-1 rounded-md border-solid border bg-gray-100 flex py-2 px-4 items-center text-gray-700 hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 ">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="ml-2 mt-3">Website</p>
                                </button>
                            </div>

                            @if ($errors->has('url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="url" class="col-form-label">Visit Duration in seconds</label>
                            <p>Select the amount of seconds you want your visitor to stay on this page. Each point is
                                worth 10 seconds!</p>
                            <div class="range">
                                <input type="range" name="duration" class="form-range" min="10" max="60" value="10" step="10" id="duration" />
                            </div>
                            <div>
                                <span><span value="10" id="range-seconds">10</span> seconds for <span id="range-points">1</span> points</span>
                            </div>

                            @if ($errors->has('url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duration') }}</strong>
                            </span>
                            @endif
                        </div>
                        <ul class="nav nav-pills pl-2 gap-6">
                            <li class="text-right limit active p-2" id="hitslimit-off"><a>
                                    <i class="fa fa-unlock"></i> Send as much traffic as possible<br><small>as long as you have points</small></a>
                            </li>
                            <li id="hitslimit-on" class="text-right p-2 limit no-active">
                                <div class="hitslimit-bg"><i class="fa fa-lock"></i> Stop traffic after reaching a limit<br><small>pauses campaign once reached</small></div>
                            </li>
                            <li>
                                <div id="hits-limit" class="flex items-center h-full gap-2" style="display: none">
                                    <input type="checkbox" hidden name="haslimit" />
                                    <input type="number" value="1000" name="hits-limit" class="hits-limit rounded border-solid border py-1 pr-1 pl-2 w-32" value="0" autocomplete="off" style="border-color: gray;">
                                    <span>hits</span>
                                </div>

                            </li>

                        </ul>

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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" form="addWebsite" class="btn btn-primary"><i class="fas fa-check"></i> Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSiteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="fas fa-link"></i> Edit Website </h5>
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
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="url" class="col-form-label">Visit Duration in seconds</label>
                            <p>Select the amount of seconds you want your visitor to stay on this page. Each point is
                                worth 10 seconds!</p>
                            <div class="range">
                                <input type="range" name="duration" class="form-range" min="10" max="60" step="10" id="duration" />
                            </div>
                            <div>
                                <span><span id="range-seconds">10</span> seconds for <span id="range-points">1</span> points</span>
                            </div>

                            @if ($errors->has('duration'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duration') }}</strong>
                            </span>
                            @endif
                        </div>

                        <ul class="nav nav-pills pl-2 gap-6">
                            <li class="text-right limit active p-2" id="hitslimit-off"><a>
                                    <i class="fa fa-unlock"></i> Send as much traffic as possible<br><small>as long as you have points</small></a>
                            </li>
                            <li id="hitslimit-on" class="text-right p-2 limit no-active">
                                <div class="hitslimit-bg"><i class="fa fa-lock"></i> Stop traffic after reaching a limit<br><small>pauses campaign once reached</small></div>
                            </li>
                            <li>
                                <div id="hits-limit" class="flex items-center h-full gap-2" style="display: none">
                                    <input type="checkbox" name="haslimit" style="display: none;" />
                                    <input type="number" value="1000" name="hits-limit" class="hits-limit rounded border-solid border py-1 pr-1 pl-2 w-32" value="0" autocomplete="off" style="border-color: gray;">
                                    <span>hits</span>
                                </div>

                            </li>
                        </ul>

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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" id="saveEditWebsite" class="btn btn-primary"><i class="fas fa-check"></i> Save
                        Changes</button>
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
        $(document).ready(function() {

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
                    success: function(res) {
                        $("#website" + site_id).remove();
                        $('#deleteSiteModal').modal('hide');
                    },
                    error: function(res) {
                        alert("button 2");
                        console.log(res);
                    }
                });
            });

            $('body').on('click', '#delsite', function(e) {
                e.preventDefault();
                var site_id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/websites/delete/" + site_id,
                    success: function(data) {
                        console.log(data);
                        $('#deleteSiteModal input[name="site-id"]').val(data.website.id);
                        $("#delete-site-url").html(data.website.url);
                    },
                    error: function(data) {
                        alert("button 1");
                        console.log('Error:', data);
                    }
                });
            });
            //----- get Site Info -----//
            $('body').on('click', '#editsite', function(e) {
                e.preventDefault();
                var site_id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/websites/edit/" + site_id,
                    success: function(data) {
                        console.log(data);
                        $('#site_id').val(data.website.id);
                        $('#site_url').val(data.website.url);
                        $("input[name=duration]")[1].value = (data.website.duration);
                        $("span[id='range-seconds']")[1].innerHTML = (data.website.duration);
                        $("span[id='range-points']")[1].innerHTML = (data.website.duration / 10);

                        if (data.website.haslimit == 1) {
                            click_Limit_On(1)
                            $("[name='hits-limit']")[1].value = (data.website.totalhits)
                        } else {
                            click_Limit_OFF(1)
                        }
                        $('#site_status').val(data.website.status);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            //----- Update Site -----//
            $("#saveEditWebsite").click(function(e) {
                e.preventDefault();
                var site_id = $('#site_id').val();
                $.ajax({
                    type: "POST",
                    url: "/websites/edit/" + site_id,
                    //dataType: "json",
                    data: {
                        url: $('#site_url').val(),
                        duration: $('[id="duration"]')[1].value,
                        haslimit: $('[name="haslimit"]')[1].checked,
                        'hitslimit': $('[name="hits-limit"]')[1].value,
                        status: $('#site_status').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#editWebsite').trigger("reset");
                        $('#editSiteModal').modal('hide');
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            //----- Duration Slider -----//
            for (let i = 0; i < $("input[name=duration]").length; i++) {
                $("input[name=duration]")[i].addEventListener("input", function() {
                    $("span[id='range-seconds']")[i].innerHTML = this.value;
                    $("span[id='range-points']")[i].innerHTML = this.value / 10;
                });
            }


            //----- Stop traffic after reaching a limit pauses campaign once reached -----//
            function click_Limit_On(i) {
                $("[id='hitslimit-on']")[i].classList.replace("no-active", "active")
                $("[id='hitslimit-off']")[i].classList.replace("active", "no-active")
                $("[id='hits-limit']")[i].style.display = "flex"
                $("[name=haslimit]")[i].checked = true
            }
            for (let i = 0; i < $("[id='hitslimit-on']").length; i++) {
                $("[id='hitslimit-on']")[i].onclick = function() {
                    click_Limit_On(i)
                }
            }


            //----- Send as much traffic as possible as long as you have points-----//
            function click_Limit_OFF(i) {
                $("[id='hitslimit-off']")[i].classList.replace("no-active", "active")
                $("[id='hitslimit-on']")[i].classList.replace("active", "no-active")
                $("[id='hits-limit']")[i].style.display = "none"
                $("[name=haslimit]")[i].checked = false
            }
            for (let i = 0; i < $("[id='hitslimit-off']").length; i++) {
                $("[id='hitslimit-off']")[i].onclick = function() {
                    click_Limit_OFF(i)
                }
            }

            //----- Add website-----//
            function createElement(str) {
                var div = document.createElement('div');
                div.innerHTML = str;
                return div.childNodes;
            }

            function Click_Another_Website_Box(i) {
                counted_child = $("[id='url_place']")[i].childElementCount
                var div = document.createElement('div');

                var mi = document.createElement("input");
                mi.setAttribute('type', 'url');
                mi.setAttribute('class', 'form-control');
                mi.setAttribute('id', 'url');
                mi.setAttribute('name', 'url[' + counted_child + ']');
                mi.setAttribute('placeholder', 'Enter website address (e.g. http://mywebsite.com)');

                div.setAttribute("class","flex gap-3");
                div.innerHTML = mi.outerHTML + '<button type="button" id="delete_Website" class="flex w-[52px] h-10 border border-gray-400 bg-gray-200 rounded-md justify-center items-center hover:bg-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>';

                $("[id='url_place']")[i].appendChild(div)
                Add_Event_Delete_Website()
            }

            for (let i = 0; i < $("[id='add_website']").length; i++) {
                $("[id='add_website']")[i].onclick = function() {
                    Click_Another_Website_Box(i)
                }
            }


            //----- Delete website-----//
            function Click_Delete_Website(i) {
                var Url_Place = $("[id='delete_Website']")[i].parentElement.parentElement;
                $("[id='delete_Website']")[i].parentElement.remove()
                for (let i = 0; i < Url_Place.childElementCount; i++) {
                    Url_Place.children[i].children[0].setAttribute("name","url["+i+"]")
                   
                }
            }


            function Add_Event_Delete_Website() {
                for (let i = 0; i < $("[id='delete_Website']").length; i++) {
                    $("[id='delete_Website']")[i].onclick = function() {
                        Click_Delete_Website(i)
                    }
                }
            }
            Add_Event_Delete_Website();

        });
    </script>
    @endsection