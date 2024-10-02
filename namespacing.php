
<!-- Iterables in PHP are objects that can be iterated over using a loop. They implement the Traversable interface, which provides the getIterator() method. This method returns an Iterator object that can be used to step through the elements of the iterable.

Applications of Iterables

Collections: Iterables are commonly used to represent collections of elements, such as arrays, lists, or sets. -->

<?php

class MyCustomIterable implements Iterator {
    private $data = [1, 2, 3, 4, 5];
    private $position = 0;

    public function current() {
        return $this->data[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset($this->data[$this->position]);
    }
}

$iterable = new MyCustomIterable();

foreach ($iterable as $value) {
    echo $value . PHP_EOL;
}
