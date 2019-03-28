<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a624w517", "oor3La7a", "a624w517");

    $UserName = $_POST["username"];

    function HTMLButton($text)
    {
        echo "<br><form action=\"https://people.eecs.ku.edu/~a624w517/EECS448Lab5/CreateUser/CreateUser.html\">";
        echo "<input type=\"submit\" value=\"$text\" />";
        echo "</form>";
    }

    if($UserName == "")
    {
        echo "<center>";
        echo "No user was created because you did not enter a username.";
        HTMLButton("Go Back");
        echo "</center>";
    }
    else
    {
        $duplicateCheck = "SELECT user_id FROM Users WHERE user_id='$UserName'";
        if($result = $mysqli->query($duplicateCheck))
        {
            $duplicates = mysqli_num_rows($result);
            if($duplicates)
            {
                echo "<center>";
                echo "User id already exists, please try a differed id.";
                HTMLButton("Go Back");
                echo "</center>";
            }
            else
            {
                $query = "INSERT INTO Users (user_id) VALUES ('$UserName')";

                if ($mysqli->query($query) === TRUE)
                {
                    echo "<center>";
                    echo $UserName . " was successfully stored in the database.";
                    HTMLButton("Add Another");
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
        }
    }

?>