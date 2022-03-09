<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
    jQuery(document).ready(function($){
        $.ajaxSetup({
                  headers : {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  }
              });
         //send request
        $('#add-friend').click(function(e){
            $.ajaxSetup(
            {
              headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
            }
        );

        e.preventDefault();

        var user_id = jQuery("#frinedId").val();
        $.ajax({
            url  : "/add-friend",
            type : 'POST',
            data : {user_id:user_id},
            datatype:'json',
            success:function(data){
                    //myfun('#add-frind',data.stauts);
                    jQuery('#unfriend').show();
                    jQuery('#add-friend').hide();
                console.log(data);
            },
            error:function(error){
                console.log(error);
            }
        })
        });

        //Accept Request

        $('#accept-friend').click(function(e){

              e.preventDefault();
              $.ajaxSetup({
                  headers : {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  }
              });
              var user_id = jQuery('#frinedId').val();
              $.ajax({
                  url :"{{route('friends.accept')}}",
                  type :'POST',
                  data : { user_id :  user_id },
                  datatype :'json',
                  success:function(data){ 
                      $('#deny-friend').hide();
                      $('#accept-friend').hide();
                      $('#unfriend').show();
                      console.log(data.stauts);
                  }
              })
        });

        //deny requests

        $('#deny-friend').click(function(e){

            e.preventDefault();
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            var user_id = jQuery('#frinedId').val();
            $.ajax({
                type : 'POST',
                url : "{{route('friends.deny')}}",
                data : {
                    user_id  : user_id
                },
                success:function(data){
                    $('#accept-friend').hide();
                    $('#deny-friend').hide();
                    $('#add-friend').show();
                    console.log(data.stauts)
                },
                
                error:function(error){
                    console.log(eror);
                }
            })
        });


        $('#unfriend').click(function(e){

            e.preventDefault();
            var user_id = jQuery('#frinedId').val();
            $.ajax({
                type : 'POST',
                url : "{{route('friends.unfriend')}}",
                datatype: 'json',
                data : {
                    user_id : user_id,
                },
                success:function(data){
                    jQuery('#add-friend').show();
                    jQuery('#unfriend').hide();
                    console.log(data.stauts);
                },
                error:function(error){
                    console.log(error)
                },
            })
        });

        function myfun(id,stauts){
        jQuery(id).html(stauts);
        };

        $('#get-friends').click(function(){
            
                $.get('/get-friend/'+1,function(data,stauts){
                     console.log(data);
                })
        })
    });
</script>