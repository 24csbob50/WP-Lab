<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }

        .header {
            background-image: linear-gradient(rgba(160, 108, 92, 0.7), rgba(167, 104, 123, 0.7)),
                              url("https://4kwallpapers.com/images/wallpapers/dark-background-abstract-background-network-3d-background-3840x2160-8324.png");
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(201, 172, 172, 0.9);
            border-radius: 50px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #4b3855;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            color: #4d3737;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 16px;
            text-align: left;
            width: 100%;
        }

        input, select, button {
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="text"], input[type="date"], input[type="tel"], select {
            background-color: #fff;
        }

        input[type="radio"], input[type="checkbox"] {
            width: auto;
        }

        .radio-group, .checkbox-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 5px;
        }

        .checkbox-group input,
        .radio-group input {
            margin-right: 8px;
        }

        .checkbox-group label,
        .radio-group label {
            font-size: 14px;
            color: #1f1b1b;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        button {
            cursor: pointer;
            border-radius: 20%;
            border-style: none;
            max-width: 90px;
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
            transform: translateY(-5px);
        }

    </style>

</head>
<body>
    <section class="header">
        <div class="container">
            <h2>Registration Form</h2>
            
            <form action="new_server.php" method="post">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject of Interest</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                        <option value="SE">Software engineering</option>
                        <option value="AI">Artificial intelligence</option>
                        <option value="ML">Machine Learning</option>
                        <option value="CB">Cybersecurity</option>
                        <option value="CA">Integration Architect</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Languages Known</label>
                    <div class="checkbox-group">
                        <input type="checkbox" id="python" name="languages[]" value="Python">
                        <label for="python">Python</label>
                        <input type="checkbox" id="CPP" name="languages[]" value="C++">
                        <label for="CPP">C++/ C</label>
                        <input type="checkbox" id="Java" name="languages[]" value="Java">
                        <label for="Java">Java</label>
                        <input type="checkbox" id="ruby" name="languages[]" value="Ruby">
                        <label for="ruby">Ruby</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input type="tel" id="contact" name="contact" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" id="pincode" name="pincode" required>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" required>
                </div>

                <div class="form-group">
    <label for="country">Country</label>
    <select id="country" name="country" required>
        <option value="">Select a country</option>
        <option value="United States">United States</option>
        <option value="Canada">Canada</option>
        <option value="China">China</option>
        <option value="Australia">Australia</option>
        <option value="Brazil">Brazil</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="Russia">Russia</option>
        <option value="Japan">Japan</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="India">India</option>
        <option value="Italy">Italy</option>
    </select>
</div>


                <div class="button-group">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = htmlspecialchars($_POST["firstName"]);
    $last = htmlspecialchars($_POST["lastName"]);
    $pwd = htmlspecialchars($_POST["password"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $subject = htmlspecialchars($_POST["subject"]);

    $languages = isset($_POST["languages"]) ? $_POST["languages"] : [];

    $dob = htmlspecialchars($_POST["dob"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $address = htmlspecialchars($_POST["address"]);
    $pincode = htmlspecialchars($_POST["pincode"]);
    $state = htmlspecialchars($_POST["state"]);
    $country = htmlspecialchars($_POST["country"]);

    echo "<h3>Your Info:</h3>";
    echo "First Name: " . $first . "<br>";
    echo "Last Name: " . $last . "<br>";
    echo "Password: " . $pwd . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Subject of Interest: " . $subject . "<br>";

    echo "Languages Known: ";
    if (empty($languages)) {
        echo "No languages selected.<br>";
    } else {
        foreach ($languages as $language) {
            echo $language . "  ";
        }
    }
    echo "<br>";
    echo "Date of Birth: " . $dob . "<br>";
    echo "Contact No: " . $contact . "<br>";
    echo "Address: " . $address . "<br>";
    echo "Pincode: " . $pincode . "<br>";
    echo "State: " . $state . "<br>";
    echo "Country: " . $country . "<br>";
}
?>



        </div>
    </section>
</body>
</html>
