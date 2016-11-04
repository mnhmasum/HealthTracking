<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">HEALTH TRACKER</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>view_sensors_datas">Home</a></li>
            <li><a href="<?php echo base_url();?>sensors/create_sensor">Create sensor type</a></li>
            <li><a href="<?php echo base_url();?>sensors/view_sensors">View sensor type</a></li>
            <li><a href="<?php echo base_url();?>sensors/create_sensor_data">Insert sensor data</a></li>
            <li><a href="<?php echo base_url();?>sensors/view_sensors_datas">View sensors datas</a></li>
        </ul>
        <div class="btn pull-right"><a href="<?php echo base_url();?>Login/logout">Logout</a></div>
    </div>
</nav>