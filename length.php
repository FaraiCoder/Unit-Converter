<?php
$length= "";
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
 $length = "Please enter a valid number";
}
else {
     if ($type == "Length") {
        $units = [
                    "m" => 1,
                    "km"=> 1000,
                    "cm"=> 0.01,
                    "mm"=> 0.001,
                    "mi"=> 1609.344,
                    "ft"=> 0.3048,
                    "in"=> 0.0254,
        ]; 
    }
    //Converting using base units
if ($type != "temperature") {
    $base = $value * $units[$from];
    $converted = $base/$units[$to];
    $length = round($converted, 2);
}
}
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
               <option value="Length">Length</option>
      </select><br><br>

        <input type="text" name="value" placeholder="Enter value" required>
        <br><br>

         <select name="from">
           <option value="m">Meters</option>
                <option value="km">Kilometers</option>
                <option value="cm">Centimeters</option> 
                <option value="mm">Millimeters</option>
                <option value="mi">Miles</option>
                <option value="ft">Feet</option>
                <option value="in">Inches</option>
         </select>

           <select name="to">
             <option value="m">Meters</option>
                <option value="km">Kilometers</option>
                <option value="cm">Centimeters</option> 
                <option value="mm">Millimeters</option>
                <option value="mi">Miles</option>
                <option value="ft">Feet</option>
                <option value="in">Inches</option>
           </select><br>

           <input type="submit" value="Convert"><br> 
     <h3>Result: <?php echo $length; ?></h3>  

    </form>
</body>
</html>