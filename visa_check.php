<?php
$visa_message = "";
$validation_message = "";
$user_details = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['country'])) {
        $country = $_POST['country'];
        if ($country == "USA") {
            $visa_message = "Visa required for most applicants.";
        } elseif ($country == "Canada") {
            $visa_message = "Visa required unless you have an eTA.";
        } elseif ($country == "India") {
            $visa_message = "Visa required before travel.";
        } elseif ($country == "UK") {
            $visa_message = "Visa depends on the duration of stay.";
        } elseif ($country == "Australia") {
            $visa_message = "eVisa available for eligible travelers.";
        } else {
            $visa_message = "Invalid country selection.";
        }
    }

    if (isset($_POST['name'], $_POST['passport_number'], $_POST['country'])) {
        $name = $_POST['name'];
        $passport_number = $_POST['passport_number'];
        $country = $_POST['country'];
        $user_details = ['name' => $name, 'passport_number' => $passport_number, 'country' => $country];

        if (empty($name) || empty($passport_number) || empty($country)) {
            $validation_message = "All fields are required!";
        } elseif (strlen($passport_number) < 8 || strlen($passport_number) > 10) {
            $validation_message = "Invalid passport number!";
        } else {
            $validation_message = "Visa application submitted successfully!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Check</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .header {
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(160, 108, 92, 0.7), rgba(0, 0, 0, 0.5)), url("https://4kwallpapers.com/images/wallpapers/dark-background-abstract-background-network-3d-background-3840x2160-8324.png") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color:rgba(211, 173, 160, 0.7);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }
        h2 {
            text-align: center;
            font-size: 26px;
            color: #4b3855;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        label {
            color: #333;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            width: 100%;
        }
        input, select, button {
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            margin-top: 8px;
        }
        select {
            background-color: #fafafa;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        button {
            cursor: pointer;
            border-radius: 8px;
            border: none;
            padding: 12px 25px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button[type="submit"] {
            background-color: #3e2e42;
            color: white;
        }
        button[type="reset"] {
            background-color: #364931;
            color: white;
        }
        button:hover {
            background-color: #b3594a;
            transform: translateY(-2px);
        }
        button:active {
            transform: translateY(0);
        }
        .message {
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }
        .message p {
            color: #4b3855;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .details {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }
        .details p {
            font-size: 16px;
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <section class="header">
        <div class="container">
            <h2>Visa Requirement</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="country">Select Your Country</label>
                    <select name="country" id="country" required>
                        <option value="">Select a Country</option>
                        <option value="USA" <?php echo isset($user_details['country']) && $user_details['country'] == 'USA' ? 'selected' : ''; ?>>USA</option>
                        <option value="Canada" <?php echo isset($user_details['country']) && $user_details['country'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
                        <option value="India" <?php echo isset($user_details['country']) && $user_details['country'] == 'India' ? 'selected' : ''; ?>>India</option>
                        <option value="UK" <?php echo isset($user_details['country']) && $user_details['country'] == 'UK' ? 'selected' : ''; ?>>UK</option>
                        <option value="Australia" <?php echo isset($user_details['country']) && $user_details['country'] == 'Australia' ? 'selected' : ''; ?>>Australia</option>
                    </select>
                </div>
                <div class="button-group">
                    <button type="submit">Check Visa</button>
                </div>
            </form>

            <?php if (!empty($visa_message)): ?>
                <div class="message">
                    <h3>Visa Information:</h3>
                    <p><?php echo $visa_message; ?></p>
                </div>
            <?php endif; ?>

            <h2>Visa Application</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($user_details['name']) ? $user_details['name'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="passport_number">Passport Number (8-10 characters)</label>
                    <input type="text" id="passport_number" name="passport_number" value="<?php echo isset($user_details['passport_number']) ? $user_details['passport_number'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="country">Select Your Country</label>
                    <select name="country" id="country" required>
                        <option value="">Select a Country</option>
                        <option value="USA" <?php echo isset($user_details['country']) && $user_details['country'] == 'USA' ? 'selected' : ''; ?>>USA</option>
                        <option value="Canada" <?php echo isset($user_details['country']) && $user_details['country'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
                        <option value="India" <?php echo isset($user_details['country']) && $user_details['country'] == 'India' ? 'selected' : ''; ?>>India</option>
                        <option value="UK" <?php echo isset($user_details['country']) && $user_details['country'] == 'UK' ? 'selected' : ''; ?>>UK</option>
                        <option value="Australia" <?php echo isset($user_details['country']) && $user_details['country'] == 'Australia' ? 'selected' : ''; ?>>Australia</option>
                    </select>
                </div>
                <div class="button-group">
                    <button type="submit">Apply for Visa</button>
                    <button type="reset">Reset</button>
                </div>
            </form>

            <?php if (!empty($validation_message)): ?>
                <div class="message">
                    <p class="error"><?php echo $validation_message; ?></p>
                </div>
            <?php endif; ?>

            <?php if ($validation_message == "Visa application submitted successfully!"): ?>
                <div class="details">
                    <h3>Your Details:</h3>
                    <p><strong>Name:</strong> <?php echo $user_details['name']; ?></p>
                    <p><strong>Passport Number:</strong> <?php echo $user_details['passport_number']; ?></p>
                    <p><strong>Country:</strong> <?php echo $user_details['country']; ?></p>
                    <p><?php echo $validation_message; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
