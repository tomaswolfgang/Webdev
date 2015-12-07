<?php

	require 'vendor/autoload.php';
	$servername = "localhost";
	$username = "root";
	$password = "260562995";
	$dbname = "tasklist";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//given an array [username, name, description, fin date, cat, priority, reminder]
	function addTask($vars) {
		global $conn;
		$sql = "INSERT INTO tasks VALUES ('".$vars->{"username"}."','".$vars->{"task_name"}."','".$vars->{"description"}."','".$vars->{"finish_date"}."','".$vars->{"category"}."','')";
		$result = $conn->query($sql);
	}

	function printAll() {
		global $conn;
		$sql = "SELECT * FROM tasks ORDER BY finish_date desc";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<head>
					<script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
					<link rel='stylesheet' href='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css'>
					<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
				</head>";
		    echo "<body><table  class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
		    		<thead>
				        <tr>
				          <th>username</th>
				          <th class='mdl-data-table__cell--non-numeric'>Task Name</th>
				          <th class='mdl-data-table__cell--non-numeric'>Description</th>
				          <th class='mdl-data-table__cell--non-numeric'>Finish Date</th>
				          <th class='mdl-data-table__cell--non-numeric'>Category</th>
				        </tr>
				    </thead>";
		    // output data of each row
			echo "<tbody>";
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>
		        		<td>".$row["username"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["task_name"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["description"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["finish_date"] . "</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["category"] . "</td>
		         	</tr>";
		    }
		    echo "</tbody></table></body>";
		} else {
		    echo "0 results";
		}
	}

	function finishedCount($username){
		global $conn;
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$res = $result->fetch_assoc();
			echo $res["finished"];

		}
	}
	function finishTask($vars, $username){
		global $conn;
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$res = $result->fetch_assoc();
			$finished = $res["finished"];
			$finished = $finished + 1;
			$sql1 = "UPDATE users SET finished = $finished WHERE username = '$username'";
			$conn->query($sql1);
			deleteTask($vars);
			echo $finished;
		}
		
	}

	function printByUsername($username) {
		global $conn;
		$sql = "SELECT * FROM tasks where username = '$username' ORDER BY finish_date asc";
		$result = $conn->query($sql);
		$count = 0;

		if ($result->num_rows > 0) {
		    echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'  id='tasktable'>
		    		<thead>
				        <tr>
				          <th class='mdl-data-table__cell--non-numeric'>Task Name</th>
				          <th class='mdl-data-table__cell--non-numeric'>Description</th>
				          <th class='mdl-data-table__cell--non-numeric'>Finish Date</th>
				          <th class='mdl-data-table__cell--non-numeric'>Category</th>
				        </tr>
				    </thead>";
		    // output data of each row
			echo "<tbody>";
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr id='tableValues".$count."' onclick='selectRow(".$count.")'>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["task_name"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["description"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["finish_date"] . "</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["category"] . "</td>
		       		</tr>";
		        $count++;
		    }
		    echo "</tbody></table>";
		} else {
		    echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'  id='tasktable'>
		    		<thead>
				        <tr>
				          <th class='mdl-data-table__cell--non-numeric'>Task Name</th>
				          <th class='mdl-data-table__cell--non-numeric'>Description</th>
				          <th class='mdl-data-table__cell--non-numeric'>Finish Date</th>
				          <th class='mdl-data-table__cell--non-numeric'>Category</th>
				        </tr>
				    </thead>";

		}
	}

	function deleteTask($vars) {
		global $conn;
		$sql = "DELETE FROM tasks WHERE ( 
			username ='".$vars->{"username"}."' and 
			task_name ='".$vars->{"task_name"}."'and 
			description ='".$vars->{"description"}."'and 
			finish_date ='".$vars->{"finish_date"}."'and 
			category='".$vars->{"category"}."') limit 1";
		$result = $conn->query($sql);	
	}

	function deleteOldTasks() {
		global $conn;
		$sql = "SELECT * FROM tasks WHERE finish_date < CURDATE()";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
	        $s = "DELETE FROM tasks WHERE ( 
				username ='".$row['username']."' and 
				task_name ='".$row['task_name']."'and 
				description ='".$row['description']."'and 
				finish_date ='".$row['finish_date']."'and 
				category='".$row['category']."') limit 1";
			$r = $conn->query($s);	
		}	
	}
?>