<?php
    //Defining Variables
    $usernameErr = $passwordErr = "";
    $username = $password = "";
    $isValid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isValid = true;

        $username = clean_input($_POST["username"]);
        if (empty($username)) {
            $usernameErr = "Username is required";
            $isValid = false;
        }
        else if (strcmp($username, "mjb0501") !== 0) {
            $usernameErr = "Username is incorrect";
            $isValid = false;
        }

        $password = clean_input($_POST["password"]);
        if (empty($password)) {
            $passwordErr = "Password is required";
            $isValid = false;
        }
        else if (strcmp($password, "dog!129.845")) {
            $passwordErr = "Password is incorrect";
            $isValid = false;
        }

    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>