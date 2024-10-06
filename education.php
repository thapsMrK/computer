<?php
if (isset($_POST['submit'])) {
    $school = $_POST['school_name'];
    $university = $_POST['university_attended'];
    $majors = $_POST['university_majores'];
    $course = $_POST['course_studied'];

    // Database Connection
    $conn = new mysqli('localhost', 'Thapelo Kekana', 'MrK@0123', 'my_website');

    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO education (school_name, university_attended, university_majores, course_studied) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $school, $university, $majors, $course);
        $stmt->execute();

        echo "Details updated"; 
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Background</title>
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
    <div class="video-background">
        <video autoplay muted loop>
            <source src="my website (3).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .personal_information {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px; /* Changed from rgba to a solid color for clarity */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        input {
            margin: 10px 0;
        }
        form {
            width: 100%;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
         }
    </style>
    <style>
      

a{
    cursor: pointer;
    
}



.header-main{
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
}



.header-main-nav{
    width: fit-content;
    height: 100%;
}


.header-main-nav ul{
    list-style-type: none;
    margin-left: 30px;
}

.header-main-nav ul li{
    display: inline;
    float: center;
    margin-left: 10px;
    
}

.header-main-nav ul a{
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    line-height: 60px;
    
} 
.div-main{
    font-size: 100px;
    font-weight: 400;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}
     /* styles.css */
     body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

.video-background {
    position: fixed; /* Fixed to stay in the background */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden; /* Prevents overflow */
    z-index: -1; /* Sends the video behind other content */
}

.video-background video {
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    position: absolute; /* Position absolute to cover the entire background */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Adjust position */
}
input {
            padding: 15px; /* Increase space inside the input */
          margin: 10px;  /* Add space around the input */
         font-size: 16px; /* Optional: adjust font size for better readability */
          border: 1px solid #ccc; /* Optional: border styling */
          border-radius: 5px; /* Optional: rounded corners */
         width: 200px; /* Optional: set a specific width */
        }



    </style>
</head>

<body> 
    <div class="personal_information">
    <h1 class="center">Educational Background</h1>
        <form action="education.php" method="post"> <!-- Fixed action to match file name -->
            <label>Name of High School Attended:</label><br>
            <input type="text" name="school_name" required placeholder="Name of high school" value="Nellmapius Secondary"><br> <!-- Updated name -->
            <label>University Attended:</label><br>
            <input type="text" name="university_attended" required placeholder="Name of the university" value="University of Limpopo"><br> <!-- Updated name -->
            <label>University Majors:</label><br>
            <input type="text" name="university_majores" required placeholder="University majors" value="Computer and Statistics"><br> <!-- Updated name -->
            <label>Course Studied:</label><br>
            <input type="text" name="course_studied" required placeholder="course studied" value="Computer Science"><br> <!-- Updated name -->
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </div>
</body>
</html>
