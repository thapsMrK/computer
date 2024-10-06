<?php
if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $surname = $_POST['Surname'];
    $studentNumber = $_POST['student_number'];
    $gender = $_POST['Gender'];
    $contactDetails = $_POST['contact_details'];
    $bio = $_POST['Bio'];
    $email = $_POST['email'];

    // Database Connection
    $conn = new mysqli('localhost', 'Thapelo Kekana', 'MrK@0123', 'my_website');
    
    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (names, surname, student_number, gender, contact_details, bio, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissss", $Name, $surname, $studentNumber, $gender, $contactDetails, $bio, $email);
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
    <title>Personal Information</title>
    <header class="header-main">
        <div>
            <nav class="header-main-nav">
                <ul>
                <li> <a href="HomePage.html">HOME</a></lI>              
                <li><a href="personal_information.php">Personal_Information</a></li>   
                <li> <a href="education.php">Education Background</a></lI>
                <li><a href="work_experience.php">work experience</a></li>  
                <li><a href="skills.php">skills</a></li>  
                <li><a href="projects.php">Projects</a></li> 
                <li><a href="contact_form.php">Contact form</a></li> 
                </ul>
            </nav> 

        </div>
     
    </header>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="my website (1).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <style>
        body {
            background-color: white;
            justify-content: center;
            align-items: center;
            height: 100vh;
                
            
        }
        .personal_information {
           max-width: 600px;
           margin: 50px auto;
           padding: rgba(0, 0, 0, 0.5);
           border-radius: 8px;
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
           position: relative;
           z-index: 1;
           text-align: center;
           align-items: center;
        }
        input {
            padding: 15px; /* Increase space inside the input */
          margin: 10px;  /* Add space around the input */
         font-size: 16px; /* Optional: adjust font size for better readability */
          border: 1px solid #ccc; /* Optional: border styling */
          border-radius: 5px; /* Optional: rounded corners */
         width: 300px; /* Optional: set a specific width */
        }
        form{
            width: 100%;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
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
    </style>
</head>
<body>
    
    <div class="personal_information">
    <h1 class="center">Personal Details</h1>
        <form action="personal_information.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" name="name" required value="Thapelo" placeholder="Name"><br>
            <label for="surname">Surname:</label><br>
            <input type="text" name="Surname" required value="Kekana" placeholder="Surname"><br>
            <label for="student number">Student Number:</label><br>
            <input type="text" name="student_number" required value="240074124" placeholder="student number"><br>
            <label for="gender">Gender:</label><br>
            <input type="text" name="Gender" required value="male" placeholder="gender"><br>
            <label for="contact details">Contact Details:</label><br>
            <input type="text" name="contact_details" required value="0678145411" placeholder="contact details"><br>
            <label for="bio">Bio:</label><br>
            <input type="text" name="Bio" required placeholder="bio" value="I am a student at the university of Limpopo, studying computer science. I am passionate about programming and statistics and artificial intelligence"><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" required value="kekanaseloghadi@gmail.com" placeholder="Email"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>




<!--I am a student at the university of Limpopo, studying computer science. I am passionate about programming and statistics and artificial intelligence -->