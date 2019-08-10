<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <h1>All Appoinments</h1>

    <p> - All Appoinments</p>
    <?php echo $this->session->flashdata('msg'); ?>

    <div class="row">

        <div class="col-md-12">
            <div class="well">
                <legend>Datas</legend>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Sensor Type</th>
                            <th>Data</th>
                            <th>User Id</th>
                            <th>Created At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        print_r($result);
                        foreach ($result as $note) {
                            echo "<tr>";
                            echo "<td>" . $note->appointment_id . "</td>";
                            echo "<td>" . $note->appointment_for_name . "</td>";
                            echo "<td>" . trim(strtoupper($note->mobile)) . "</td>";
                            echo "<td>" . $note->email . "</td>";
                            echo "<td>" . $note->appointment_date . "</td>";
                            echo "<td>" . $note->address . "</td>";
                            echo "<td>" . $note->reference . "</td>";
                            echo "<td><a href='". base_url()."Sensors/edit_sensor_data/" . $note->appointment_id . "'>Update</a></td>";
                            echo "<td><a href='". base_url() ."Sensors/delete_sensor_data/" . $note->appointment_id . "'>delete</a></td>";
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