@extends('admin.layouts.app')

@section('content')

<head>
    <!-- Tailwind css style  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.2.0/papaparse.min.js"></script>

    <!-- Theme style  -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<div class="colorlib-loader" id="colorlib-loader" hidden></div>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid bg-gray">
            <div class="row">
                <div class="col-9">
                    <div class="card mb-3 ml-3">
                        <h5 class="card-header font-bold">Add a website</h5>
                        <div class="modal-body">
                            <form id="addWebsite" method="POST" action="/websites/add">
                                {{ csrf_field() }}


                                @if(Session::has('success_msg'))
                                <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                                @endif
                                @if(Session::has('error_msg'))
                                <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                                @endif

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
                                        <div class="d-flex">
                                            <button type="button" id="add_website" class="h-10 mt-2 mb-1 rounded-md border-solid border bg-gray-100 flex py-2 px-4 items-center text-gray-700 hover:bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 ">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="m-0">Website</p>
                                            </button>

                                            <input type="file" id="uploadcsv" accept=".csv" hidden />
                                            <button type="button" id="upload_csv_website" class="h-10 mt-2 mb-1  rounded-md border-solid border bg-gray-100 flex py-2 px-4 items-center text-gray-700 hover:bg-white">
                                                <svg class="p-1" width=20 height=20 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path d="M105.4 182.6c12.5 12.49 32.76 12.5 45.25 .001L224 109.3V352c0 17.67 14.33 32 32 32c17.67 0 32-14.33 32-32V109.3l73.38 73.38c12.49 12.49 32.75 12.49 45.25-.001c12.49-12.49 12.49-32.75 0-45.25l-128-128C272.4 3.125 264.2 0 256 0S239.6 3.125 233.4 9.375L105.4 137.4C92.88 149.9 92.88 170.1 105.4 182.6zM480 352h-160c0 35.35-28.65 64-64 64s-64-28.65-64-64H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456z" />
                                                </svg>
                                                <p class="m-0 ml-2">Upload CSV file</p>
                                            </button>
                                        </div>

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

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" form="addWebsite" class="btn btn-primary"><i class="fas fa-check"></i> Save
                                            Changes</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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

            //----- Upload CSV-----//
            $("#upload_csv_website").click(function(e) {
                document.querySelector("#uploadcsv").click()

            })
            //----- Parse CSV-----//
            $('body').on('change', '#uploadcsv', function(e) {
                $("#colorlib-loader")[0].hidden=false;
                Papa.parse($("#uploadcsv")[0].files[0], {
                    download: true,
                    skipEmptyLines: true,
                    complete: async function(results) {
                        for (let index = 0; index < results.data.length; index++) {
                            let urltext = results.data[index][0];
                            if (urltext.includes(".")) {
                                Click_Another_Website_Box(0,urltext)                                
                            }
                        }
                        $("#colorlib-loader")[0].hidden=true;
                    }
                })
            });


            function Click_Another_Website_Box(i,text) {
                counted_child = $("[id='url_place']")[i].childElementCount
                var div = document.createElement('div');

                var mi = document.createElement("input");
                mi.setAttribute('type', 'url');
                mi.setAttribute('class', 'form-control');
                mi.setAttribute('id', 'url');
                mi.setAttribute('name', 'url[' + counted_child + ']');
                mi.setAttribute('value', text);
                mi.setAttribute('placeholder', 'Enter website address (e.g. http://mywebsite.com)');

                div.setAttribute("class", "flex gap-3");
                div.innerHTML = mi.outerHTML + '<button type="button" id="delete_Website" class="flex w-[52px] h-10 border border-gray-400 bg-gray-200 rounded-md justify-center items-center hover:bg-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>';

                $("[id='url_place']")[i].appendChild(div)
                Add_Event_Delete_Website()
            }

            for (let i = 0; i < $("[id='add_website']").length; i++) {
                $("[id='add_website']")[i].onclick = function() {
                    Click_Another_Website_Box(i,"")
                }
            }


            //----- Delete website-----//
            function Click_Delete_Website(i) {
                var Url_Place = $("[id='delete_Website']")[i].parentElement.parentElement;
                $("[id='delete_Website']")[i].parentElement.remove()
                for (let i = 0; i < Url_Place.childElementCount; i++) {
                    Url_Place.children[i].children[0].setAttribute("name", "url[" + i + "]")

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