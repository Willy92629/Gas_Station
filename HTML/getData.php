<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT `站代號` FROM `service` WHERE `自助` = '1s'";
    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "Search Results:<br>";
        while ($row = mysqli_fetch_assoc($rs)) {
            echo $row['站代號'] . "<br>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>