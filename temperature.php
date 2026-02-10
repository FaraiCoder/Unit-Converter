<?php
$temperature= "";
$value= "";
$from= "";
$to= "";
$type= "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]== "POST") {
$value= $_POST["value"];
$from= $_POST["from"];
$to= $_POST["to"];
$type= $_POST["type"];

if ($value === "" || !is_numeric($value)) {
 $temperature = "Please enter a valid number";
}

if (isset($type) && $type === "temperature" && is_numeric($value)) {
    if ($from == "c" && $to == "f") {
        $temperature = ($value * 9/5)+32;
        }
        elseif ($from == "f" && $to == "c") {
            $temperature = ($value - 32) * 5/9;
        }
        else {
            $temperature = $value;
        }
    }
        $temperature = round($temperature, 2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <h1><a href="index.php">Unit Converter</a></h1>
</header>
<body>
    <form method="post">
      <select name="type">
               <option value="temperature">Temperature</option>
      </select><br><br>

        <input type="text" name="value" placeholder="Enter value" required>
        <br><br>

         <select name="from">
           <option value="c">Celcius</option>
                   <option value="f">Fahrenheit</option>
         </select>

           <select name="to">
            <option value="c">Celcius</option>
                   <option value="f">Fahrenheit.</option>
           </select><br>

           <input type="submit" value="Convert"><br> 
     <h3>Result: <?php echo $temperature; ?></h3>  

</form>
</body>
</html>