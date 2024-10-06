<?php 
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Collecting form data
    $contactNumber = $_POST['contact_numbers'];
    $emailAddress = $_POST['email_address'];
    $telephone = $_POST['telephone'];

    // Database connection
    $conn = new mysqli('localhost', 'Thapelo Kekana', 'MrK@0123', 'my_website');

    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_information (contact_number, email_address, telephone) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die('Prepare Failed: ' . $conn->error);
    }

    $stmt->bind_param("sss", $contactNumber, $emailAddress, $telephone);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Contact information submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
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
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Contact Information Form">
    <title>Contact Information</title>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="my website (4).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <style>
        body {
            background-color: white;
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
            padding: 15px; /* Increase space inside the input */
          margin: 10px;  /* Add space around the input */
         font-size: 16px; /* Optional: adjust font size for better readability */
          border: 1px solid #ccc; /* Optional: border styling */
          border-radius: 5px; /* Optional: rounded corners */
         width: 300px; /* Optional: set a specific width */
        }
        .center {
            text-align: center;
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
php{
    max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
}
    </style>
</head>
<header>
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
<body>
    <div class="personal_information">
    <h1 class="center">CONTACT INFORMATION</h1>
        <form action="contact_form.php" method="post">
            <label>Contact Numbers:</label><br>
            <input type="text" name="contact_numbers" required placeholder="contact numbers" value="067 814 5411"><br>
            <label>Email Address:</label><br>
            <input type="email" name="email_address" required placeholder="email" value="240074124@keyaka.ul.ac.za"><br>
            <label>Telephone:</label><br>
            <input type="text" name="telephone" required placeholder="telephone number" value="012 558 10111"><br>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </div>
</body>
</html>
