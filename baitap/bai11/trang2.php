<!DOCTYPE html>
<html>
<head>
    <title>Trang 2 - Display Data</title>
</head>
<body>
    <h2>Received Data:</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = htmlspecialchars($_POST["firstname"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        
        echo "<p><b>Your First Name:</b> $firstname</p>";
        echo "<p><b>Your Last Name:</b> $lastname</p>";
    } else {
        echo "<p>No data received.</p>";
    }
    ?>
</body>
</html>
