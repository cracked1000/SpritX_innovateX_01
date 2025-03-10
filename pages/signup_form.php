<?php
include("../includes/header.php");
session_start();
?>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl text-emerald-600 font-bold text-center mb-4 mt-3" id="form-title">Sign Up</h2>
        
        <?php
        // Display server-side errors from session
        if (isset($_SESSION['signup_errors']) && !empty($_SESSION['signup_errors'])) {
            echo '<div id="server-error-container" class="mb-4 p-3 bg-red-50 border border-red-200 rounded-md">';
            foreach ($_SESSION['signup_errors'] as $error) {
                echo '<div class="text-red-500">' . htmlspecialchars($error) . '</div>';
            }
            echo '</div>';
            // Clear the errors from session after displaying
            unset($_SESSION['signup_errors']);
        }
        ?>
       
        <form id="signup-form" action="../process/signup.php" method="POST">
            <input type="hidden" name="form_type" id="form_type" value="signup">
           
            <div class="mb-4">
                <label class="block text-gray-700">Username</label>
                <input type="textbox" name="username" id="username" required class="w-full px-3 py-2 border rounded-lg">
                <p id="nameError" class="text-red-500 text-sm mt-1 font-semibold"></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded-lg">
                <p id="passwordError" class="text-red-500 text-sm mt-1 font-semibold"></p>
               
                <!-- Password Strength Bar -->
                <div class="h-2 mt-2 w-full bg-gray-300 rounded-md">
                    <div id="strength-bar" class="h-2 bg-red-500 w-0 rounded-md"></div>
                </div>
                
                <!-- Password Requirements List -->
                <div class="mt-2 text-sm">
                <p id="lengthCheck" data-text="At least 8 characters" class="text-red-500">❌ At least 8 characters</p>
                <p id="uppercaseCheck" data-text="At least one uppercase letter" class="text-red-500">❌ At least one uppercase letter</p>
                <p id="lowercaseCheck" data-text="At least one lowercase letter" class="text-red-500">❌ At least one lowercase letter</p>
                <p id="numberCheck" data-text="At least one number" class="text-red-500">❌ At least one number</p>
                <p id="specialCharCheck" data-text="At least one special character" class="text-red-500">❌ At least one special character</p>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="w-full px-3 py-2 border rounded-lg">
                <p id="matchError" class="text-red-500 text-sm mt-1 font-semibold"></p>
            </div>
            
            <!-- Client-side error container -->
            <div id="error-container" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-md"></div>
            
            <button type="submit" id="submit" class="w-full bg-emerald-600 text-white font-semibold py-2 rounded-lg mt-2 hover:bg-emerald-500 transition duration-200" disabled>
                Sign Up
            </button>
        </form>
        <p class="text-center mt-4 text-gray-600">
            <span id="toggle-text">Already have an account?</span>
            <a href="../pages/login_form.php" id="toggle-form" class="text-emerald-600">Log in</a>
        </p>
    </div>
    <script src="../assets/js/signup.js"></script>
</body>
</html>