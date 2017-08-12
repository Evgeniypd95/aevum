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
                
<script type="text/javascript">document.getElementById("myBtn").style.width = "<?php $tothour = $timedb->time; $width = $tothour*100/21; if ($width>100) {echo 100;} else {echo $width;}?>%";</script>



            <p class="text-center">
            Total hours:</br>
            <?php 
            if (empty($timetotal->time)) echo "0";
            else echo $timetotal->time;  ?>/10000</p>

            <p class="text-center">With current rate you will get to top by <?php $years = round(((10000 - 1010.35)/(21/7))/365); $year = date('Y', strtotime('tomorrow')); $sum = $year+$years; echo "Year $sum";?></p>
            
                    
<!-- Blog Entries Column -->

                <h2 class="page-header">
                    New Entry
                </h2>
                    
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo form_open('http://127.0.0.1:4567/home_controller/form'); ?>
                        <div class="form-group">
                            <label for="InputActivity">Activity</label>
                            <input type="text" class="form-control" name="activity" id="InputActivity" placeholder="Activity">
                        </div>
                        <div class="form-group">
                            <label for="InputTime">Time</label>
                            <input type="text" class="form-control" name="time" id="InputTime" placeholder="120 hour">
                        </div>
                        <div class="form-group">
                            <label for="InputComment">Comment</label>
                            <textarea class="form-control" id="InputComment" name="comment" rows="3"></textarea>
                        </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                <h2 class="page-header">
                    Your Entries
                </h2>

                <!-- First Blog Post -->
                
                <?php foreach ($query->result() as $row): ?>

                    
                
                <h3><?php echo $row->activity;?></h3><br />
                Time: <?php echo $row->time;?><br />
                Comment: <?php echo $row->comment;?><hr>

                <?php endforeach;?>
                
            

        