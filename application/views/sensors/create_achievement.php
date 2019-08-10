<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">

            
            <?php echo form_open_multipart('Sensors/save_achievement');?>
            <?php echo "<input type='file' name='images' size='20' />"; ?>
            <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
            <?php echo "</form>"?>

                <?php $attributes = array("class" => "form-horizontal", "name" => "sensorsaveform");
                echo form_open(base_url() . "Sensors/save_achievement", $attributes); ?>
                <fieldset>
                    <legend>Create a new achievement</legend>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Name</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="title" placeholder="Title" type="text"
                                   value="<?php echo set_value('name'); ?>"/>
                            <span class="text-danger"><?php echo form_error('sensor_type_id'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Image</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="file" placeholder="image" type="text"
                                   value="<?php echo set_value('mible_no'); ?>"/>
                            <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="email" class="control-label">Details</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="details" placeholder="Email" type="text"
                                   value="<?php echo set_value('email'); ?>"/>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="date" class="control-label">Video</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="video" placeholder="Date" type="text"
                                   value="<?php echo set_value('date'); ?>"/>
                            <span class="text-danger"><?php echo form_error('date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="address" class="control-label">Address</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="address" placeholder="Address" type="text"
                                   value="<?php echo set_value('address'); ?>"/>
                            <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="reference" class="control-label">Reference</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="reference" placeholder="Reference" type="text"
                                   value="<?php echo set_value('reference'); ?>"/>
                            <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="reference" class="control-label">Agenda</label>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="agenda" placeholder="Reference" type="text"
                                   > <?php echo set_value('reference'); ?></textarea>
                            <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="submit" type="submit" class="btn btn-primary" value="Save"/>
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>