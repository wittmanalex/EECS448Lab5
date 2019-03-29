<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a624w517", "oor3La7a", "a624w517");

    $posts = $_POST["Posts"];

    function HTMLButton($text)
    {
        echo "<br><form action=\"https://people.eecs.ku.edu/~a624w517/EECS448Lab5/DeletePost/DeletePost.html\">";
        echo "<input type=\"submit\" value=\"$text\" />";
        echo "</form>";
    }
    
    if(!empty($posts))
    {
        echo "<center>";
        echo "<h1> Deleted Posts </h1>";
        echo "<table border=\"1\">";
        echo "<tr><th> Post ID </th></tr>";
    
        for($i = 0; $i < count($posts); $i++)
        {
            $query = "Delete FROM Posts WHERE post_id=\"" . $posts[$i] . "\";";
    
            if($mysqli->query($query) === TRUE)
            {
                echo "<tr><td>" . $posts[$i] . "</td></tr>";
            }
        }
        echo "</table>";
        HTMLButton("Back To Posts");
        echo "</center>";
    }
    else
    {
        echo "<center>";
        echo "No posts were selected, so no posts were deleted.";
        HTMLButton("Back To Posts");
        echo "</center>";
    }

?>