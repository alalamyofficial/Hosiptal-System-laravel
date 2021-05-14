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

                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Device</th>
                                    <th scope="col">Browser</th>
                                    <th scope="col">Ip</th>
                                    <th scope="col">Platform</th>
                                    <th scope="col">url</th>
                                    <th scope="col">Since</th>
                                    </tr>
                                </thead>
                                <tbody>
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

                            $sql = "SELECT id, device, browser, ip, platform ,uri ,created_at FROM shetabit_visits";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                               
                                    echo "<tr>";
                                    echo "<th>$row[id]</th>";
                                    echo "<td>$row[device]</td>";
                                    echo "<td>$row[browser]</td>";
                                    echo "<td>$row[ip]</td>";
                                    echo "<td>$row[platform]</td>";
                                    echo "<td>$row[uri]</td>";
                                    echo "<td>$row[created_at]</td>";
                                    echo "</tr>";
                                
                                        
                            }

                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>

                            </tbody>
                            </table>


						</div>
					</div>
                </div>    


@endsection