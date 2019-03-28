<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a624w517", "oor3La7a", "a624w517");

    $UserName = $_POST["username"];
    $Content = $_POST["content"];

    function HTMLButton($text)
    {
        echo "<br><form action=\"https://people.eecs.ku.edu/~a624w517/EECS448Lab5/CreatePost/CreatePost.html\">";
        echo "<input type=\"submit\" value=\"$text\" />";
        echo "</form>";
    }

    $checkUserName = "SELECT user_id FROM Users WHERE user_id='$UserName'";

    if($Content == "")
    {
        echo "<center>";
        echo "Post not created because the post contained no content.";
        HTMLButton("Go Back");
        echo "<center>";
    }
    else if($result = $mysqli->query($checkUserName))
    {
        $userExists = mysqli_num_rows($result);
        if($userExists)
        {
            $postID = mysqli_num_rows($mysqli->query("SELECT post_id FROM Posts")) + 1;
            $query = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$postID', '$Content', '$UserName');";
            
            if ($mysqli->query($query) === TRUE)
                {
                    echo "<center>";
                    echo "Post was successfully stored in the database.";
                    HTMLButton("Post Another");
                    echo "</center>";
                }
                else
                {
                    echo "<center>";
                    echo "An error occurred. Please try again.";
                    HTMLButton("Go Back");
                    echo "</center>";
                }
        }
        else
        {
            echo "<center>";
            echo "User does not exist.";
            HTMLButton("Go Back");
            echo "<center>";
        }
    }
?>