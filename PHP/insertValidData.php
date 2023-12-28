<?php
    if ($isValid) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            //set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("INSERT INTO reviews (content, review, rating, reviewDate) 
            VALUES (:content, :review, :rating, CURDATE())");

            //change these variables to whatever the real variables are once created
            $sql->bindParam(':content', $content);
            $sql->bindParam(':review', $review);
            $sql->bindParam(':rating', $rating);

            $sql->execute();

            $last_id = $conn->lastInsertID();
            $_SESSION["last_id"] = "$last_id";

            //need to create confirmation page for whenever a review is submitted rewatch Database_ConnectingWithPHP
            header("Location: confirmation.php");
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>