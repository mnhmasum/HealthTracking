<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <h1>All Sensors</h1>

    <p> - All notes are visible here in a table</p>
    <?php echo $this->session->flashdata('msg'); ?>

    <div class="row">

        <div class="col-md-12">
            <div class="well">
                <legend>Sensors</legend>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sensors</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($result as $sensors) {
                            echo "<tr>";
                            echo "<td>" . $sensors->id . "</td>";
                            echo "<td>" . $sensors->sensor_name . "</td>";
                            echo "<td><a href='edit_sensor/" . $sensors->id . "'>Update</a></td>";
                            //echo "<td><a href='Sensors/delete_sensor/" . $sensors->id . "'>delete</a></td>";
                            echo "</tr>";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
        seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>

</div>
</body>
</html>