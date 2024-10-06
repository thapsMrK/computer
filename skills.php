<?php
// Initialize a message variable
$message = "";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Collecting form data
    $skillsAttained = $_POST['skills_attained'];
    $speciality = $_POST['speciality'];
    $experience = $_POST['experience'];

    // Database connection
    $conn = new mysqli('localhost', 'Thapelo Kekana', 'MrK@0123', 'my_website');

    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO skills (skills_attained, speciality, experience) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die('Prepare Failed: ' . $conn->error);
    }

    $stmt->bind_param("sss", $skillsAttained, $speciality, $experience);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Skills submitted successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    } 

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills</title>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="my website.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <header class="header-main">
        <nav class="header-main-nav">
            <ul>
                <li><a href="HomePage.html">HOME</a></lI>              
                <li><a href="personal_information.php">Personal_Information</a></li>   
                <li> <a href="education.php">Education Background</a></lI>
                <li><a href="work_experience.php">work experience</a></li>  
                <li><a href="skills.php">skills</a></li>  
                <li><a href="projects.php">Projects</a></li> 
                <li><a href="contact_form.php">Contact form</a></li> 
            </ul>
        </nav>
    </header>
    
    <style>
        body {
            background-color: #1e1e1e;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .personal_information {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        input {
            padding: 15px;
            margin: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }
        .center {
            text-align: center;
            color: white;
        }
        /* styles.css */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .video-background video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        a {
            cursor: pointer;
        }
        .header-main {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
        }
        .header-main-nav {
            width: fit-content;
            height: 100%;
        }
        .header-main-nav ul {
            list-style-type: none;
            margin-left: 30px;
        }
        .header-main-nav ul li {
            display: inline;
            margin-left: 10px;
        }
        .header-main-nav ul a {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            line-height: 60px;
        }
        .div-main {
            font-size: 100px;
            font-weight: 400;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
    </style>
</head>

<body> 
    <div class="personal_information">
        <h1 class="center">SKILLS</h1>
        <form action="skills.php" method="post">
            <label>Skills attained:</label><br>
            <input type="text" name="skills_attained" required placeholder="skills" value="Programming, Coding, Stats Analysis"><br>
            <label>Speciality:</label><br>
            <input type="text" name="speciality" required placeholder="speciality" value="coding and programming"><br>
            <label>Experience:</label><br>
            <input type="text" name="experience" required placeholder="experience" value="12 year experince"><br>            
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </form>
        <?php if (!empty($message)) echo "<p class='center'>$message</p>"; ?>
    </div>
</body>
</html>
