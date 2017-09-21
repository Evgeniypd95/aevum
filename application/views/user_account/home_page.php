<!-- Page Content -->
    <div class="container" style="margin-top: 20px;">






<div class="row">
            <div class="col-md-12">
            <p class="text-center" style="margin-top: 40px;">
            Your progress from last monday to this sunday is:</br>
            <?php
            if (empty($timedb->time)) echo "0";
            else echo $timedb->time;  ?>/21</p>
                <div class="progressbar"><div id="myBtn" class="progressbar2"></div>
                </div>
                </div></div>

                <?php
                if (!empty($remainder)) echo $remainder; ?>

                
                <a href="http://127.0.0.1:4567/home_controller/useremainder">use remainder for your current week.</a>

<script type="text/javascript">document.getElementById("myBtn").style.width = "<?php $tothour = $timedb->time; $width = $tothour*100/21; if ($width>100) {echo 100;} else {echo $width;}?>%";</script>



            <p class="text-center">
            Total hours:</br>
            <?php
            if (empty($timetotal->time)) echo "0";
            else echo $timetotal->time;  ?>/10000</p>

            <p class="text-center">With current rate you will get to top by <?php $years = round(((10000 - 1010.35)/(21/7))/365); $year = date('Y', strtotime('tomorrow')); $sum = $year+$years; echo "Year $sum";?></p>
            <a href="http://127.0.0.1:4567/home_controller/logout/">logout</a>

<!-- Blog Entries Column -->

                <h2 class="page-header">
                    New Entry
                </h2>
                <a href="http://127.0.0.1:4567/home_controller/startcount">start count</a><br>
                <?php if (!empty($timer->start)){$date1=date_create($timer->start);
                $date2=date_create(date('Y-m-d H:i:s'));
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%d");
                $hours = $diff->format("%h");
                $minutes = $diff->format("%i")/60;
                $seconds = $diff->format("%s")/360;
                $timediff = $hours+$minutes+$seconds;}
 ?>
 <div id="scope"><?php if (!empty($timer->start)){echo $diff->format("%d days %h hours %i minutes %s seconds");} ?></div> <script type="text/javascript">
     var $scores = $("#scores");
setInterval(function () {$("#scope").load("http://127.0.0.1:4567/home_controller/ #scope");
}, 1000);
 </script>
                <a href="http://127.0.0.1:4567/home_controller/stopcount">stop count</a>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo form_open('http://127.0.0.1:4567/home_controller/form'); ?>
                        <div class="form-group">
                            <label for="InputTime">Time</label>
                            <input type="text" class="form-control" name="time" id="InputTime" placeholder="120 hour" value="">
                        </div>
                        <div class="form-group">
                            <label for="InputActivity">Activity</label>
                            <input type="text" class="form-control" name="activity" id="InputActivity" placeholder="Activity">
                        </div>
                            <button type="submit" id ='two' onclick="change()" class="btn btn-default">Submit</button>
                    </form>

                    <script type="text/javascript">
                        $('#two').click(function(){
    $('#InputTime').val('<?= $timediff ?>');
});


                    </script>
                <h2 class="page-header">
                    Your Entries
                </h2>

                <!-- First Blog Post -->

                <?php foreach ($query->result() as $row): ?>



                <h3><?php echo $row->activity;?></h3><br />
                Time: <?php echo $row->time;?><br />
                Comment: <?php echo $row->comment;?><hr>

                <?php endforeach;?>
