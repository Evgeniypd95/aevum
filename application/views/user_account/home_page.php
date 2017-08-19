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
            <a href="http://127.0.0.1:4567/home_controller/logout/">logout</a> 
                    
<!-- Blog Entries Column -->
    
                <h2 class="page-header">
                    New Entry
                </h2>
                <a href="http://127.0.0.1:4567/home_controller/strtcountdown">start</a>
                <?php if (!empty($timer->start)) {
                    $starttime = $timer->start;
                    $nowtime = date('Y-m-d H:i:s');
                    $timediff = date('H:i:s', date(strtotime($nowtime))-date(strtotime($starttime)));
                    echo $timediff;
                } 

                 ?>
            
<!-- <script type="text/javascript">


    var currentTime = new Date("<?php echo $starttime; ?>");
var y = currentTime.getFullYear();
var d = currentTime.getDate();
var m = currentTime.getMonth()+1;
var h = currentTime.getHours();
var i = currentTime.getMinutes();
var s = currentTime.getSeconds();

if (i < 10) {
    i = "0" + i;
}
y = y.toString().substr(-2);

var tst = m + "/"+d+"/"+ y+" "+ h + ":"+ i+":"+s;
<?php $test5 = 'document.write(tst);'; ?>
// document.write(tst);

</script>

<?php echo $test5; ?> -->
<!-- 
                 <p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $starttime; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date("<?php echo $nowtime; ?>").getTime();

  // Find the distance between now an the count down date
  var distance = - countDownDate + now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hoursdiff = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> 
 -->
                   <!-- <p id="demo"></p>
                    <script type="text/javascript">// Set the date we're counting down to


// Update the count down every 1 second
var x = setInterval(function() {

    
    
    // Find the distance between now an the count down date
    var d = new Date();    
    // Time calculations for days, hours, minutes and seconds
    var c_year = d.getFullYear();
    var c_month = d.getMonth()+1;
    var c_day = d.getDate();
    var c_hour = d.getHours();
    var c_min = d.getMinutes();
    var c_sec = d.getSeconds();
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = c_year + "/" + c_month + "/" + c_day + " " + c_hour + ":" + c_min + ":" + c_sec;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);</script> -->
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
                
            

        