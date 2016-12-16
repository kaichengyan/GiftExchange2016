<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gift Exchange 2016</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

        <?php
        include("./dbinfo.php");
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
        if (mysqli_connect_errno()) {
            echo "MySQLi Connection was not established: " . mysqli_connect_error();
        }
        mysqli_set_charset($conn, "utf8");
        $name = $_POST["name"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$name'");
        $row = mysqli_fetch_array($result);
        $receiver = $row["receiver"];
        $receiver_result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$receiver'");
        $receiver_row = mysqli_fetch_array($receiver_result);
        $receiver_address = $receiver_row["address"];
        if ($_POST["name"] && $_POST["password"] && $row["password"] == $_POST["password"]) {
            echo "<div class=\"page-header\">";
            echo "<h1>Hello, " . $name . "!</h1>";
            echo "</div>";
            echo "<p>You are giving your Christmas gift to " . $receiver . "!</p>";
            echo "<p>His/her mailing address, if you should need it, is " . $receiver_address . ".</p>";
            echo "<p>Have a fantastic December!</p>";
        } else {
            echo "<div class=\"page-header\">";
            echo "<h1>Sorry, we can't find your information.</h1>";
            echo "</div>";
        }
        mysqli_close($conn);
        ?>
        <p>Made with &hearts; by Kyle Yan.</p>
</div>
</body>
</html>
