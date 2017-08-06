<!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        

            <!-- Blog Entries Column -->
            <div class="row">
            <div class="col-md-12">
            <p class="text-center" style="margin-top: 40px;">1300/10000</p>
                <div class="progressbar"><div class="progressbar2"></div>
                </div>
                </div></div>
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
                            <input type="time" class="form-control" name="time" id="InputTime" placeholder="120 min">
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
                
            </div>

        </div>
        <!-- /.row -->