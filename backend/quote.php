<?php
$connect = mysqli_connect("localhost", "root", "", "data", 4306);
if (!$connect) {
    echo "failed";
}

// Check if form data is present in $_POST array
if (isset($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['options'], $_POST['message'])) {
    // Escape form values to prevent SQL injection
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
    $options = mysqli_real_escape_string($connect, $_POST['options']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);

    // Insert data into the database
    $query = "INSERT INTO quote2 (`Name`, `Email`, `Mobile`, `Product`, `Message`) VALUES ('$name', '$email', '$mobile', '$options', '$message')";
    if (mysqli_query($connect, $query)) {
        header("Location: ../success.html");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
} 

mysqli_close($connect);
?>
