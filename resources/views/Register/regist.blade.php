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
            <button type="button" class="active">PSign Up as User</button>
            <button type="button">Sign Up as Veterinarian</button>
        </div>
    </div>
</body>
</html>