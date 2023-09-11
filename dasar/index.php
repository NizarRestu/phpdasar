<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Variable -->
    <?php
    $txt = "Hello world!";
    $x = 5;
    $y = 10.5;
    echo "$x <br>";
    echo "$txt <br>";
    echo $y;
    ?>
    <br>
    <br>
    <!-- if else -->
    <?php
    $t = 10;

    if ($t % 2 == 0) {
        echo "Ini angka genap $t";
    } else {
        echo "Ini angka ganjil $t";
    }
    ?>
    <br>
    <br>
    <!-- Switch -->
    <?php
    $favfruit = "test";

    switch ($favfruit) {
        case "jeruk":
            echo "Jeruk";
            break;
        case "aple":
            echo "Aple";
            break;
        case "melon":
            echo "Melon";
            break;
        default:
            echo "Ini apaan dah = $favfruit";
    }
    ?>
    <br>
    <br>
    <!-- Foreach -->
    <?php $mobil = array("toyota", "avanza", "xenia", "tesla");
    foreach ($mobil as $car) {
        echo "$car <br/>";
    } ?>
    <br>
    <br>
    <!-- Function -->
    <?php
    function name($nama)
    {
        echo "Nama saya adalah $nama";
    }
    name("Nizar")

    ?>
    <br>
    <br>
    <!-- Array -->
    <?php
    $cars = array("Volvo", "BMW", "Toyota");
    echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
    ?>
    <br>
    <br>
    <!-- Date and Time  -->
    <?php
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l");
    ?> 
    <br> <br>
    <!-- PHP OOP -->
    <?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_color($color) {
    $this->color = $color;
  }
  function get_color() {
    return $this->color;
  }
}

$apple = new Fruit();
$apple->set_name('Apple');
$apple->set_color('Red');
echo "Name: " . $apple->get_name();
echo "<br>";
echo "Color: " . $apple->get_color();
?>
<br> 
<br>
<!-- PHP Constructor -->
<?php
class komputer {
  public $prosesor;
  public $memory;
  public $ram;

 public function __construct($prosesor = "prosesor" , $memory = "memory" , $ram = "RAM") {
    $this->prosesor = $prosesor;
    $this->memory = $memory;
    $this->ram = $ram;
  }
 public function getData() {
    return "$this->prosesor | $this->memory | $this->ram";
  }
}

$komputer1  = new komputer("AMD Ryzen 5700H ", "512 GB" , "16 GB");
$komputer2  = new komputer("Core i5 " , "256 GB");

echo "Spek Komputer Rumah : " . $komputer1->getData();
echo "<br>";
echo "<br>";
echo "Spek Komputer Sekolah : " . $komputer2->getData();
?>
<br>
<br>
<!-- Destructor -->
<?php
class product {
public $ram;
function __construct($ram  = "RAM") {
    $this->ram = $ram;
  }
 public function __destruct() {
    echo "RAM Komputer {$this->ram}";
  }
}
$komputer1 = new product("32 GB");
?>
<!--  -->
<br>
<br>
<?php session_start();
echo 'Id user saya adalah ' . $_SESSION['logegd_in_user_id'];
echo "<br>";
echo 'Username saya adalah ' . $_SESSION['logegd_in_user_name'];
echo "<br>";?>

</body>

</html>