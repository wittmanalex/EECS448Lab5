<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a624w517", "oor3La7a", "a624w517");

    $query = "SELECT * FROM Users";
    
    echo "<center>";
    echo "<h1>All Users</h1>";

    if($result = $mysqli->query($query))
    {
        echo "<table>";
        while($user = $result->fetch_assoc())
        {
            echo "<tr>";
            echo $user["user_id"];
            echo "<tr><br>";
        }
        echo "</table>";
    }
    echo "</center>";
?>