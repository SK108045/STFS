<?php
$connect = mysqli_connect("localhost", "root", "", "data", 4306);
if (!$connect) {
    echo "failed";
}

// Check if form data is present in $_POST array
if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    // Escape form values to prevent SQL injection
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $subject = mysqli_real_escape_string($connect, $_POST['subject']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);
    

    // Insert data into the database
    $query = "INSERT INTO contact (`Name`, `Email`, `Subject`,`Message`) VALUES ('$name', '$email','$subject','$message')";
    if (mysqli_query($connect, $query)) {
        header("Location: ../success.html");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
} 

mysqli_close($connect);
?>
