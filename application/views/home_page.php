<!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <h1 class="page-header">
                    Your Entries
                </h1>

                <!-- First Blog Post -->
                
                <?php foreach ($query->result() as $row): ?>

                <li><?php echo $row->test;?><hr></li>

                <?php endforeach;?>
                
            </div>

        </div>
        <!-- /.row -->