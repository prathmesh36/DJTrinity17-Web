 <?php 
    $name;
    $venue;
    $time;
    $date;
    $counter=0;
    $sql = "SELECT * FROM tbl ORDER BY Date LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $name[$counter]=$row["name"];
            $venue[$counter]=$row["venue"];
            $time[$counter]=$row["time"];
            $date[$counter]=$row["date"];
            $counter++;
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  ?>