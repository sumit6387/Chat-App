<?php include('connect.php'); ?>
<?php include('validation.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat App - Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    
<!------ Include the above in your HEAD tag ---------->

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style type="text/css"> 
        #html{

            width: 700px;
            height: 570px;
            overflow: scroll;
        }
  
    </style>
</head>
<body onload="reload_msg(); setInterval(reload_msg, 1000);">
<div class="container" style="margin-top: 50px;">
    <div class="row">
<div>
        <div class="conversation-wrap col-lg-3">

            
           
         <?php 
                    $sql = "select * from `users`";
                    $run = mysqli_query($mysqli , $sql);
                    if(mysqli_num_rows($run)){
                        while($row = mysqli_fetch_assoc($run)){
                            ?>

<!-- start -->
            <div class="media conversation">
                <a class="pull-left" href="#">
                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="image/download.png">
                </a>
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $row['name']; ?></h5>
                    <small>Hey ! there i am using Chat App.</small>
                </div>
            </div>
            <!-- end -->

                            <?php


                        }
                    }



          ?>
          <div class="container">
              <a href="logout.php" class="btn btn-success" style="margin-top: 20px;">Logout</a>
          </div>
</div>
        </div>



        <div class="message-wrap col-lg-8">
            <div class="msg-wrap">
                <div id="html"></div>

                
                
                 
                    <input type="hidden" name="id" id="send_by" value="<?php echo $_SEESION['accept_by']; ?>">

                
            </div>

            <div class="send-wrap" style="margin-top: 10px;">

                <textarea class="form-control send-message" id = 'msg' rows="3" placeholder="Write a reply..."></textarea>
                <div id="error" style="color:red;"></div>


            </div>
            <div class="btn-panel">
                <a href="" id="send_msg" class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#send_msg').click(function(){
        var msg = $('#msg').val();
         var id = $('#send_by').val();
         var date = new Date();
         var h = date.getHours();
         var m = date.getSeconds();
         var time = h+":"+m; 
         console.log(time)
         if(msg == ''){
            $('#error').html('Enter text');
         }else{
        $.post('send_msg.php',{
                accept_by : id,
                msg : msg,
                time : time
            },function(data , status){

            })
           
            reload_msg();
            }

        })
        return false;
    })
    function reload_msg(){
         $.get('reload.php',function(data , status){
            $('#html').html(data);
         })
    }
</script>
</body>
</html>