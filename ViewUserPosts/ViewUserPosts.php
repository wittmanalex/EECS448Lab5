<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a624w517", "oor3La7a", "a624w517");

    $user_id = $_POST["username"];

    $query = "SELECT post_id, content FROM Posts WHERE author_id=\"" . $user_id . "\"";
    
    echo "<center>";
    echo "<h1>" . $user_id . "'s Posts</h1>";

    if($result = $mysqli->query($query))
    {
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th> Post ID </th>";
        echo "<th> Post Content </th>";
        echo "</tr>";

        while($post = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $post["post_id"] . "</td>";
            echo "<td>" . $post["content"] . "</td>";
            echo "</tr><br>";
        }
        echo "</table>";
    }
    echo "</center>";
?>