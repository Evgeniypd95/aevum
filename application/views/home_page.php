<!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div id="first">
      <div id="second"></div>
     </div>
                <h1 class="page-header">
                    Your Entries
                </h1>

                <!-- First Blog Post -->
                
                <?php foreach ($query->result() as $row): ?>

                    
                
                <h2><?php echo $row->activity;?></h2><br />
                Time: <?php echo $row->time;?><br />
                Comment: <?php echo $row->comment;?><hr>

                <?php endforeach;?>
                
            </div>

        </div>
        <!-- /.row -->