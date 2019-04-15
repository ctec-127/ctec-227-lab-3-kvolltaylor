<?php

    // set value of variables
    // use $_COOKIE superglobal to set value
    if (isset($_POST["country"])){
        $_COOKIE["country"] = $_POST["country"];
    } else {
        $_COOKIE["country"] = "";
    }

    if (isset($_POST["state"])){
        $_COOKIE["state"] = $_POST["state"];
    } else {
        $_COOKIE["state"] = "";
    }

    $country = $_COOKIE["country"];
    $state = $_COOKIE["state"];

    // set cookies for country and for state
    setcookie("country", $state, time() + 36000);
    setcookie("state", $country, time() + 36000);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab No.3 - Forms and Cookies</title>
</head>
<body>

<!-- begin form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (empty($_POST["country"]) OR empty($_POST["state"])){
            echo '<h1>You must select both a country and a state</h1>';
        }
    }

?>

<h3>Select a country</h3>
    <!-- select form for country -->
    <select name="country" id="country">
        <option disabled value="select"> - select an option - </option>
        <option value="United States" <?php if ($_COOKIE["country"] == "United States") echo ' selected = "selected"'?>>United States</option>
        <option value="Ukraine" <?php if ($_COOKIE["country"] == "Ukraine") echo ' selected = "selected"'?>>Ukraine</option>
        <option value="Georgia" <?php if ($_COOKIE["country"] == "Georgia") echo ' selected = "selected"'?>>Georgia</option>
    </select>

    <br><br>

<h3>Select a state</h3>
    <!-- select form for state -->
    <select name="state" id="state">
        <option disabled value="select"> - select an option - </option>
        <option value="Washington State" <?php if ($_COOKIE["state"] == "Washington State") echo ' selected = "selected"'?>>Washington State</option>
        <option value="Odessa Oblast" <?php if ($_COOKIE["state"] == "Odessa Oblast") echo ' selected = "selected"'?>>Odessa Oblast</option>
        <option value="Tblisi Region" <?php if ($_COOKIE["state"] == "Tblisi Region") echo ' selected = "selected"'?>>Tblisi Region</option>
    </select>

    <br><br>

    <button type="submit">Submit</button>

</form> <!-- end form -->
    
</body>
</html>