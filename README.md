### Installation

`composer require mitrii/complex-number`

### Usage

To create new complex object provide the real, imaginary parts 
as individual values. Third param for setting rounding numbers of digits
after comma in string representation (default 2 ).

```PHP
  $complexNumber = new Mitrii\Complex\Number(1.4556, 2.6149);
  echo $complexNumber; // output: 1.46+2.61i

  $complexNumber2 = new Mitrii\Complex\Number(1.4556, 2.6149, 3);
  echo $complexNumber2; // output: 1.456+2.615i
```

To perform mathematical operations with Complex values, you can call 
the appropriate method against a complex value, passing other value as argument

```PHP
  $complex = new Mitrii\Complex\Number(1.45, 2.61);
  $complex2 = new Mitrii\Complex\Number(3.45, 4.48);
  
  // addition
  echo $complex->add($complex2); // output: 4.90+7.09i
  
  // subtraction
  echo $complex->sub($complex2); // output: -2.00-1.87i
  
  // multiplication
  echo $complex->mul($complex2); // output: 4.90+7.09i
  
  // division
  echo $complex->div($complex2); // output: 0.52+0.08i
```

To output trigonometric form create object of class `Mitrii\Complex\TrigonometricExporter` and
pass as four argument

```PHP
  $complexNumber = new \Mitrii\Complex\Number(1.45, 2.61, 2, new \Mitrii\Complex\TrigonometricExporter());
  echo $complexNumber;  // output sqrt(8.91)*(cos(phi)+isin(phi))
```

### Run tests
`./vendor/bin/phpunit --colors ./tests`
