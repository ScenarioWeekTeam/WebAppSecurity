<!DOCTYPE html>
<html lang="en">

<body>
<?php
require 'models/comment.php';

$comment = new Comment(NULL, NULL, NULL, NULL, NULL, NULL);

$result = $comment.search();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["name"]. " - email: " . $row["email"]. " " . $row["phonenumber"] . " " . $row["course"] . " " . $row["comment"] . "<br>";
    }
} 
else {
    echo "0 results";
}

</body>

</html>
