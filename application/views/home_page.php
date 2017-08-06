<!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        

            
            

<div class="row">
            <div class="col-md-12">
            <?php foreach ($timedb->result() as $row): ?>
            <p class="text-center" style="margin-top: 40px;">
            Your progress from last monday to this sunday is:</br>
            <?php 
            if (empty($row->time)) echo "0";
            else echo $row->time;  ?>/21</p>
            <?php endforeach;?> 
                <div class="progressbar"><div id="myBtn" onclick="myFunction()" class="progressbar2"></div>
                </div>
                </div></div>
                <?php foreach ($timedb->result() as $row): ?>
<script type="text/javascript">document.getElementById("myBtn").style.width = "<?php $tothour = $row->time; $width = $tothour*100/21; if ($width>100) {echo 100;} else {echo $width;}?>%";</script>
<?php endforeach;?> 

<?php foreach ($timetotal->result() as $row): ?>
            <p class="text-center">
            Total hours:</br>
            <?php 
            if (empty($row->time)) echo "0";
            else echo $row->time;  ?>/10000</p>
            <?php endforeach;?> 
                    
<!-- Blog Entries Column -->

                <h2 class="page-header">
                    New Entry
                </h2>
                    
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo form_open('http://127.0.0.1:4567/home/form'); ?>
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
                    <?php echo $this->session->flashdata('success_msg2'); ?>
                <h2 class="page-header">
                    Your Entries
                </h2>

                <!-- First Blog Post -->
                
                <?php foreach ($query->result() as $row): ?>

                    
                
                <h3><?php echo $row->activity;?></h3><br />
                Time: <?php echo $row->time;?><br />
                Comment: <?php echo $row->comment;?><hr>

                <?php endforeach;?>
                
            

        