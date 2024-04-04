<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .form-wrapper {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
        }
        
        .form-section {
            display: none;
        }
        
        .form-section.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Sign Up</h1>
            <button type="button" class="active">Personal</button>
            <button type="button">Business</button>
            <div class="form-section active" id="personal-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Sign Up</button>
            </div>
            <div class="form-section" id="business-form">
                <label for="company">Company Name:</label>
                <input type="text" id="company" name="company" required>
                <label for="business-email">Email:</label>
                <input type="email" id="business-email" name="business_email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Sign Up</button>
            </div>
        </div>
    </div>
</body>
</html>