<?php
$connect = mysqli_connect("localhost", "root", "", "data", 4306);
if (!$connect) {
    echo "failed";
}

// Check if form data is present in $_POST array
if (isset($_POST['email'])) {
    // Escape form values to prevent SQL injection
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    // Insert data into the database
    $query = "INSERT INTO newsletteremails (`Emails`) VALUES ('$email')";
    if (mysqli_query($connect, $query)) {
        header("Location: ../success.html");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
} 

mysqli_close($connect);
?>
