<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <?php $attributes = array("class" => "form-horizontal", "name" => "sensorsaveform");
                echo form_open(base_url() . "Sensors/save_data", $attributes); ?>
                <fieldset>
                    <legend>Insert new sensor data</legend>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Patient ID</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="client_id" placeholder="Client Id" type="text"
                                   value="<?php echo set_value('title'); ?>"/>
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Test Id</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="test_id" placeholder="Test Id" type="text"
                                   value="<?php echo set_value('test_id'); ?>"/>
                            <span class="text-danger"><?php echo form_error('test_id'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Sensor Type</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="sensor_type" placeholder="Sensor" type="text"
                                   value="<?php echo set_value('title'); ?>"/>
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Data</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="data" placeholder="Data" type="text"
                                   value="<?php echo set_value('title'); ?>"/>
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label">User Id</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="user_id" placeholder="User Id" type="text"
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