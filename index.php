<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Page</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: segoe UI;
        }
        div, form {
            padding: 20px;
            margin: 20px 10px;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $email = $message = $subject = "";
    function sterilize($data) {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
    $errors = array();
    if (isset($_POST["name"])) {
        $name = sterilize($_POST["name"]);
    } else {
        array_push($errors, "Name is required.");
    }

    if (isset($_POST["email"])) {
        $email = sterilize($_POST["email"]);
    } else {
        array_push($errors, "Email is required.");
    }

    if (isset($_POST["message"])) {
        $message = sterilize($_POST["message"]);
    } else {
        array_push($errors, "Message is required.");
    }
    $subject = sterilize($_POST["subject"]);

    if(count($errors) === 0) {
        echo "Message sent!";
        $to = "aribakande@gmail.com";
        $message = "From: $name($email) <br> Message: $message";
        $headers = "From: arib1052001@gmail.com";
        mail($to,$subject,$txt,$headers);
    }
}

?>

<body>
    <h1>My Resume Page</h1>
    <div>
        <img src="pic.jpg" alt="ARIB picture" width="200px">
        <h2>Abdulrasheed Ibraheem</h2>
        <p>Full stack Developer</p>
        <p>https://arib.com.ng | +2348126430670 | aribakande@gmail.com </p>
    </div>
    <div>
        <h3><span class="bold">Experience</span></h3>
        <ul>
            <li><span class="bold">Backend Developer</span>, IWELLO (2020-present)</li>
            <li><span class="bold">Programming Instructor</span>, IBN QAYYIM PROS (2020 - 2021)</li>
            <li><span class="bold">Web Developer Intern</span>, Icitify Solutions Ltd</li>
        </ul>
    </div>
    <div>
        <p><span class="bold">Skills:</span>HTML, CSS, JavaScript, PHP, WordPress, NodeJS, MongoDB, MySQL</p>
    </div>

    <form action="index.php" method="post">
    <h3>Contact Me</h3>
        <input type="text" name="name" placeholder="Enter Your Name"><br>
        <input type="email" name="email" placeholder="Enter Your Email address"><br>
        <input type="text" name="subject" placeholder="What's your message about?"><br>
        <textarea name="message" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Send Message">
    </form>
</body>
</html>