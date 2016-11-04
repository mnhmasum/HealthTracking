<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <?php $attributes = array("class" => "form-horizontal", "name" => "sensorsaveform");
                echo form_open(base_url() . "Sensors/save_sensor", $attributes); ?>
                <fieldset>
                    <legend>Create a new sensor</legend>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Sensor Name</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="sensor_name" placeholder="Sensor Name" type="text"
                                   value="<?php echo set_value('title'); ?>"/>
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
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