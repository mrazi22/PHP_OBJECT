<!-- Abstract Classes

Describe what abstract classes are and when to use them.
Provide an example that demonstrates the implementation of an abstract class.
Interfaces -->

<?php

abstract class KitchenAppliance {   //declearing abstract class
    protected $brand;    // This line declares a protected property called $brand. The protected property is accessible within the KitchenAppliance class and its subclasses.
    protected $model;

    public function __construct($brand, $model) {  // This line defines a constructor that accepts two parameters: $brand and $model. The constructor sets the protected properties $brand and $model to the values passed to the constructor.
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getBrand() {   // This line returns the value of the protected property $brand.
        return $this->brand;
    }

    public function getModel() {   // This line returns the value of the protected property $model.
        return $this->model;
    }

    abstract public function cook();   // This line defines an abstract method called cook().
}

class Microwave extends KitchenAppliance {   // microwave inherits from KitchenAppliance parent class

    public function cook() {   // This line overrides the cook() method from the parent class.
        echo "Cooking food in the microwave.";
    }
}

// Create an instance of the Microwave class
$microwave = new Microwave("Samsung", "MW2000");

// Call the cook() method on the microwave object
$microwave->cook();

// Access the brand and model properties of the microwave
echo "Brand: " . $microwave->getBrand() . PHP_EOL;
echo "Model: " . $microwave->getModel() . PHP_EOL;

?>

<!-- Significance of Interfaces

Defining a contract: Interfaces allow you to specify a set of methods that classes must implement without dictating their internal structure. This promotes code consistency and modularity.
Achieving polymorphism: Interfaces enable you to treat objects of different types in a uniform way, making your code more flexible and adaptable.
Multiple inheritance: While PHP doesn't support multiple inheritance directly, interfaces can be used to simulate this behavior by allowing a class to implement multiple interfaces. -->


<?php

interface Timer {
    public function setTimer($minutes);   // This line declares a public method called setTimer() that takes a parameter $minutes.
    public function startTimer();
    public function stopTimer();  // This line declares a public method called stopTimer().
}

interface TemperatureControl {   // This line declares an interface called TemperatureControl that contains methods for setting and getting the temperature.
    public function setTemperature($temperature);
    public function getTemperature();
}

class Fridge implements Timer, TemperatureControl {  // This line declares a class called Fridge that implements both interfaces Timer and TemperatureControl.
    private $timerMinutes; // This line declares a private property called $timerMinutes. The property is accessible within the Fridge class and its subclasses.
    private $temperature;

    public function setTimer($minutes) {   // This line defines a public method called setTimer() that takes a parameter $minutes. The method sets the value of the $timerMinutes property to the value passed to the method.
        $this->timerMinutes = $minutes;
    }

    public function startTimer() {
        echo "Fridge timer started for " . $this->timerMinutes . " minutes.\n";
    }

    public function stopTimer() {
        echo "Fridge timer stopped.\n";
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }

    public function getTemperature() {
        return $this->temperature;
    }
}

class Oven implements Timer, TemperatureControl { // This line declares a class called Oven that implements both interfaces Timer and TemperatureControl.
    private $timerMinutes;
    private $temperature;

    public function setTimer($minutes) {
        $this->timerMinutes = $minutes;
    }

    public function startTimer() {
        echo "Oven timer started for " . $this->timerMinutes . " minutes.\n";
    }

    public function stopTimer() {
        echo "Oven timer stopped.\n";
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }

    public function getTemperature() {
        return $this->temperature;
    }
}

// Create instances of Fridge and Oven
$fridge = new Fridge();
$oven = new Oven();

// Set timers and temperatures
$fridge->setTimer(10);
$fridge->setTemperature(3);
$oven->setTimer(20);
$oven->setTemperature(350);

// Start timers
$fridge->startTimer();
$oven->startTimer();

// Stop timers
$fridge->stopTimer();
$oven->stopTimer();

// Get and print temperatures
echo "Fridge temperature: " . $fridge->getTemperature() . " degrees\n";
echo "Oven temperature: " . $oven->getTemperature() . " degrees\n";

?>


<!-- Traits in PHP

Traits are a mechanism in PHP that allow you to reuse code between classes without creating inheritance relationships. They are similar to classes but cannot be instantiated directly.

Differences from Classes and Interfaces

Inheritance: Unlike classes, traits cannot be inherited from. Instead, they can be composed into other classes using the use keyword.
Instantiation: Traits cannot be instantiated directly. They are purely for code reuse.
Multiple Inclusion: A class can include multiple traits. This is a key difference from inheritance, where a class can only extend one parent class.
 -->

 <?php

trait TimerTrait {   // This line defines a trait called TimerTrait that contains methods for setting and starting a timer.
    protected $timerMinutes;

    public function setTimer($minutes) {   // This line defines a public method called setTimer() that takes a parameter $minutes. The method sets the value of the $timerMinutes property to the value passed to the method.
        $this->timerMinutes = $minutes;
    }

    public function startTimer() {
        echo "Timer started for " . $this->timerMinutes . " minutes.\n"; // This line prints a message indicating that the timer has started.
    }

    public function stopTimer() {
        echo "Timer stopped.\n";
    }
}

class Appliance { // This line declares a class called Appliance that uses the TimerTrait trait.
    use TimerTrait;

    // ... other appliance properties and methods
}

// Create instances of Appliance
$appliance1 = new Appliance();
$appliance2 = new Appliance();

// Set timers
$appliance1->setTimer(30);
$appliance2->setTimer(60);

// Start timers
$appliance1->startTimer();
$appliance2->startTimer();

// Stop timers
$appliance1->stopTimer();
$appliance2->stopTimer();

?>
<!-- Static Properties and Methods

In object-oriented programming, static properties and methods belong to the class itself, rather than individual instances of the class. This means they can be accessed directly using the class name without creating an object.

Use Cases:

Class-level data: When you need to store data that is shared across all instances of a class, static properties are useful. For example, you could use a static property to count the total number of objects created from a class. -->

<?php

class CarWash { // This line declares a class called CarWash.
    private static $totalCarsWashed = 0; // This line declares a static property called $totalCarsWashed.

    public function washCar() { // This line defines a public method called washCar().
        self::$totalCarsWashed++; // This line increments the value of the static property $totalCarsWashed.
        echo "Car washed!\n";
    }

    public static function getTotalCarsWashed() {
        return self::$totalCarsWashed; // This line returns the value of the static property $totalCarsWashed.
    }
}

// Create instances of CarWash
$carWash1 = new CarWash();
$carWash2 = new CarWash();

// Wash cars
$carWash1->washCar();
$carWash2->washCar();
$carWash2->washCar();
$carWash2->washCar();

// Get the total number of cars washed
echo "Total cars washed: " . CarWash::getTotalCarsWashed() . PHP_EOL;
?>


<!-- Namespaces in PHP are used to organize code and prevent naming conflicts between different parts of your application. They provide a hierarchical structure for grouping classes, functions, and constants, making your code more manageable and scalable.

Importance of Namespaces

Prevent naming conflicts: By grouping related code within namespaces, you can avoid conflicts with code from other libraries or parts of your application. -->


