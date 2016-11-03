<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <?php
                foreach ($notes as $note) {
                    $attributes = array("class" => "form-horizontal", "name" => "sensorUpdateForm");
                    echo form_open(base_url() . "Notes/update_note/" . $note->id, $attributes);
                    ?>
                    <fieldset>
                        <legend>Update Sensor</legend>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name" class="control-label">Title</label>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="title" placeholder="Title" type="text"
                                       value="<?php echo $note->title; ?>"/>
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="submit" type="submit" class="btn btn-primary" value="Save"/>
                            </div>
                        </div>
                    </fieldset>
                    <?php
                    echo form_close();
                    echo $this->session->flashdata('msg');
                } ?>
            </div>
        </div>
    </div>

</div>
</body>
</html>