<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "dacenj4b_qplus";
$password = "Dacentric@db";
$dbname = "dacenj4b_qplus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     echo "Data added successfully";
    $name = $_POST["name"];
    $email = $_POST["email"];


    $sql = "INSERT INTO test (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Data added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Database</title>
</head>
<body>
    <h2>Add to Database</h2>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" onsubmit="return sendAlrt()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">Add to Database</button>
    </form>
    
    <script>
        function sendAlrt() {
            alert("Form submitted successfully!");
            return true;
        }
    </script>
</body>
</html>
