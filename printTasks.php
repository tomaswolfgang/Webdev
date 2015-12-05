<?php 

	function printByUsername($username) {
		global $conn;
		$sql = "SELECT * FROM tasks where username = '$username' ORDER BY priority ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
		    		<thead>
				        <tr>
				          <th>username</th>
				          <th class='mdl-data-table__cell--non-numeric'>Task Name</th>
				          <th class='mdl-data-table__cell--non-numeric'>Description</th>
				          <th class='mdl-data-table__cell--non-numeric'>Finish Date</th>
				          <th class='mdl-data-table__cell--non-numeric'>Category</th>
				          <th>Priority</th>
				        </tr>
				    </thead>";
		    // output data of each row
			echo "<tbody>";
		    // output data of each row
		    $count = 0;
		    while($row = $result->fetch_assoc()) {
		        echo "<tr id='task".$count."'>
		        		<td>".$row["username"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["task_name"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>".$row["description"]."</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["finish_date"] . "</td>
		        		<td class='mdl-data-table__cell--non-numeric'>" . $row["category"] . "</td>
		        		<td >" . $row["priority"]. "</td>
		        	</tr>";
		        $count++;
		    }
		    echo "</tbody></table>";
		} else {
		    echo "0 tasks";
		}
	}

	?>