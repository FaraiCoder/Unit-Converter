<?php
$weight= "";
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
 $weight = "Please enter a valid number";
}
else {
     if ($type == "Weight") {
        $units = [
                    "g"=> 1,
                    "kg"=> 1000,
                    "lb"=> 453.59237,
                    "oz"=> 28.349523125
        ]; 
    }
    //Converting using base units
if ($type != "temperature") {
    $base = $value * $units[$from];
    $converted = $base/$units[$to];
    $weight = round($converted, 2);
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
               <option value="Weight">Weight</option>
      </select><br><br>

        <input type="text" name="value" placeholder="Enter value" required>
        <br><br>

         <select name="from">
             <option value="g">Grams</option>
                 <option value="kg">Kilograms</option>
                  <option value="lb">Pounds</option>
                   <option value="oz">Ounces</option>
         </select>

           <select name="to">
             <option value="g">Grams</option>
                 <option value="kg">Kilograms</option>
                  <option value="lb">Pounds</option>
                   <option value="oz">Ounces</option>
           </select><br>

           <input type="submit" value="Convert"><br> 
     <h3>Result: <?php echo $weight; ?></h3>  

    </form>
</body>
</html>