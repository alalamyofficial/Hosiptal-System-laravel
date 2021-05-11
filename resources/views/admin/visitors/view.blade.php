@extends('admin.admin_layout')
@section('content')

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Who Visit Me</h4>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">

                        <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "health_care";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, device, browser FROM shetabit_visits";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - device: " . $row["device"]. " " . $row["browser"]. "<br>";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                    ?>



						</div>
					</div>
                </div>    


@endsection