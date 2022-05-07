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