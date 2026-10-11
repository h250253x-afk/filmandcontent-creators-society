<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once 'includes/database.php';

$successMessage = "";
$errorMessage = "";

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $fullname = trim(filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $role = trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($fullname) || empty($email) || empty($message)) {
        $errorMessage = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } else {
        try {
            $sql = "INSERT INTO members (fullname, email, role, message) VALUES (:fullname, :email, :role, :message)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':fullname' => $fullname,
                ':email'    => $email,
                ':role'     => $role,
                ':message'  => $message
            ]);

            $successMessage = "Thank you, $fullname! Your membership application has been submitted successfully.";
        } catch (PDOException $e) {
            $errorMessage = "Error saving application: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us - Film & Content Creators Society</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1>Film & Content Creators Society</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.php">Join Us</a></li>
                <li><button id="themeToggle" class="theme-toggle-btn" onclick="toggleTheme()">☀️ Light Mode</button></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Join the Club / Get in Touch</h2>
        <p>Fill out the form below to register as a member.</p>

        <!-- PHP Dynamic Response Banners -->
        <?php if (!empty($successMessage)): ?>
            <div style="background-color: #10b981; color: #ffffff; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <strong>Success!</strong> <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errorMessage)): ?>
            <div style="background-color: #ef4444; color: #ffffff; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <strong>Error!</strong> <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form name="joinForm" action="contact.php" method="POST" onsubmit="return validateForm(event)">
            <div>
                <label for="fullname">Full Name:</label><br>
                <input type="text" id="fullname" name="fullname">
            </div>

            <br>

            <div>
                <label for="email">Email Address:</label><br>
                <input type="email" id="email" name="email">
            </div>

            <br>

            <div>
                <label for="role">Primary Creative Interest:</label><br>
                <select id="role" name="role">
                    <option value="Directing / Filmmaking">Directing / Filmmaking</option>
                    <option value="Video Editing / Color Grading">Video Editing / Color Grading</option>
                    <option value="YouTube / Content Creation">YouTube / Content Creation</option>
                    <option value="Acting / On-Camera Talent">Acting / On-Camera Talent</option>
                </select>
            </div>

            <br>

            <div>
                <label for="message">Message / Why do you want to join?:</label><br>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>

            <br>

            <br>

            <div class="contact-container">
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p><strong>Email:</strong> filmandcontentcreatorssociety@gmail.com</p>
                    <p><strong>Phone:</strong> +263 777 777 777</p>
                    <p><strong>Location:</strong> Hostel 2, Room 212</p>
                </div>

                <!-- Contact Form Section -->
                <form action="contact.php" method="POST">
                <!-- your existing form fields here -->
                </form>
            </div>

            <br>

            <button type="submit" name="submit">Submit Application</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2026 Film & Content Creators Society. All rights reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>