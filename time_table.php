<?php

include 'include/config.php';
 
// Query the database to retrieve the timetable data
$sql = "SELECT * FROM subject";
$result = mysqli_query($connect, $sql);

// Example usage of the generateTimetable function

echo "<table border='1'>";
echo "<tr>
<th>Day</th>
<th>Subject</th>
<th>Time</th>
</tr>";
while($schedule = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$schedule['Day']."</td>";
    echo "<td>".$schedule['name']."</td>";
    echo "<td>".$schedule['start_time']."</td>";
    echo "</tr>";
}
echo "</table>";
?>
