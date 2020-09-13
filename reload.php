<?php
include('connect.php');
include('validation.php');

                    $sql2 = 'select * from `msg`';
                    $run2 =mysqli_query($mysqli , $sql2);
                    if(mysqli_num_rows($run2)){
                        while($row = mysqli_fetch_assoc($run2)){
                            $id = $row['send_by'];
                            $sql3 = "select * from `users` where `id` = '$id'";
                            $run4 = mysqli_query($mysqli , $sql3);
                            $row2 = mysqli_fetch_assoc($run4);
                            $name = $row2['name'];

                            ?>

            <div class="media msg">
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="image/download.png">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> <?php echo $row['time']; ?> </small>
                        <h5 class="media-heading"><?php echo $name; ?></h5>
                        <?php
                                if($_SESSION['accept_by'] == $id){
                                    ?>

                                        <small class="col-lg-10" style="background-color: #25D366;border-radius: 4px;height:40px;padding-top: 15px;font-size: 15px;"><?php echo $row['msg']; ?></small>
                                    <?php
                                }else{
                                    ?>
                                    <small class="col-lg-10" style="background-color: gray;border-radius: 4px;height:50px;padding-top: 20px;font-size: 15px;color:white;"><?php echo $row['msg']; ?></small>
                                    <?php
                                }
                        ?>
                        
                    </div>
                </div>

                            <?php
                        }
                    }
                 ?>