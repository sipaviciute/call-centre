<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taksofonas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="content-wrap">
        <header>
            <div class="container">
                <h1 class="text-left">Taksofonas</h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </nav> 
            </div>
        </header>
    
    <div class="full-size-icon">
        <div class="center-container">    
            <main>
                <div class="container">
                    <h2>So call me maybe...</h2>
                    <div class="input-group">
                        <input type="text" id="textInput" placeholder="Type in your phone number..." maxlength="20">
                        <button id="submitButton" type="button" onclick="submitNumber()">Calling</button>
                    </div>
                </div>
            </main>
        </div> 
    </div>
 
    <script>
    function validateInput(input) {
        let value = input.value;
        if (value.startsWith('+')) {
            value = '+' + value.slice(1).replace(/[^\d]/g, '');
        } else {
            value = value.replace(/[^\d]/g, '');
        }
        input.value = value;
        return value;
    }

    function submitNumber() {
    console.log("Button clicked"); // To confirm the button click is registered
    var input = document.getElementById('textInput');
    var phoneNo = validateInput(input);
    console.log("Phone number to submit:", phoneNo); // To see the phone number after validation

    // Send data to server-side script
    fetch('submit_number.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'phone_number=' + encodeURIComponent(phoneNo)
    })
    .then(response => {
        console.log("Response received"); // To confirm the fetch call was made
        return response.text();
    })
    .then(data => {
        console.log("Data received:", data); // To see the data received from the server
        input.value = ''; // Clear the input field after the data is submitted
    })
    .catch((error) => {
        console.error('Error:', error);
    });
    }
    </script>
</body>
</html>