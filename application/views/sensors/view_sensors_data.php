<?php $this->load->view('header.php'); ?>
<body>
<div class="container">
    <?php $this->load->view('nav.php'); ?>

    <h1>All Sensors Data</h1>

    <p> - All sensor's data shown here by patient name</p>
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
                            <th>Patient Name</th>
                            <th>Test Id</th>
                            <th>Sensor Type</th>
                            <th>Data</th>
                            <th>User Id</th>
                            <th>Created At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($result as $note) {
                            echo "<tr>";
                            echo "<td>" . $note->id . "</td>";
                            echo "<td>" . $note->client_id . "</td>";
                            echo "<td>" . trim(strtoupper($note->test_id)) . "</td>";
                            echo "<td>" . $note->sensor_type . "</td>";
                            echo "<td><div style='width:300px;word-wrap:break-word;'>" . $note->data . "</div></td>";
                            echo "<td>" . $note->user_id . "</td>";
                            echo "<td>" . $note->created_at . "</td>";
                            echo "<td><a href='". base_url()."Sensors/edit_sensor_data/" . $note->id . "'>Update</a></td>";
                            echo "<td><a href='". base_url() ."Sensors/delete_sensor_data/" . $note->id . "'>delete</a></td>";
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