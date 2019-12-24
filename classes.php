<?php
header('Content-type: text/plain; charset=utf-8');
//Прямоугольник
class Rectangle {
	public $name = 'Прямоугольник';
	public $height;	
	public $width;

	public function calculateArea (){
		return $this->height * $this->width;
	}
	public function __construct($height, $width){
		$this->height = $height;
		$this->width = $width;
		$this->area = $this->calculateArea();
	}
}


$myRect = new Rectangle(10, 2);
echo $myRect->area; // Output: 20


//Круг

class Circle {
	public $name = 'Круг';
	public $radius;

	public function calculateArea(){
		return $this->radius * $this->radius * pi();
	}

	public function __construct($radius){
		$this->radius = $radius;
		$this->area = $this->calculateArea();
	}

}

$myCircle = new Circle(14);
echo $myCircle->calculateArea(); // Output: 615.7521601036



//Треугольник
class Triangle {
	public $name = 'Треугольник';	
	public $sideA;
	public $sideB;
	public $sideC;

	public function calculateArea(){
		$a = $this->sideA;
		$b = $this->sideB;
		$c = $this->sideC;
		$hPerimeter = ($this->sideA+$this->sideB+$this->sideC)/2;
		return sqrt($hPerimeter
			*($hPerimeter-$a)
			*($hPerimeter-$b)
			*($hPerimeter-$c));
	}

	public function __construct($sideA, $sideB, $sideC){
		$this->sideA = $sideA;
		$this->sideB = $sideB;
		$this->sideC = $sideC;
		$this->area = $this->calculateArea();
	}


};

$myTrngl = new Triangle (8,9,11.3);
echo $myTrngl->calculateArea(); // Output: 35.738952751165


//Генерация случайных объектов классов с заполнением случайными значениями
$figuresArray = array();
function createRandomFigures ($numberOfFigures){
	global $figuresArray;
	for ($i = 0; $i<$numberOfFigures; $i++){
		switch(rand(1,3)){
			case 1: 
				array_push($figuresArray, new Rectangle (rand(1,100),rand(1,100)));
				break;
			case 2:
				array_push($figuresArray, new Circle (rand(1,100)));
				break;
			case 3:
				// Сторона треугольника не может быть больше суммы двух других сторон
				$triangleRandomA = rand(1,100);
				$triangleRandomB = rand(1,100);
				$triangleRandomC = sqrt($triangleRandomA*$triangleRandomA
				+ $triangleRandomB*$triangleRandomB);
				array_push($figuresArray, new Triangle ($triangleRandomA,$triangleRandomB,$triangleRandomC));
				break;
		}
	}

}

createRandomFigures(4); 
print_r($figuresArray); // Выведет массив со случайными фигурами

//Cохранение массива объектов в файл .txt
$filename = 'figures.txt';
$text = json_encode($figuresArray, JSON_UNESCAPED_UNICODE); 
file_put_contents($filename, $text);
//Чтение масива объектов из файла
$text = file_get_contents($filename);
print_r($text);


//Сортировка объектов по убыванию площади и вывод на экран

usort($figuresArray, function($a, $b){
    return ($b->calculateArea() - $a->calculateArea());
});

print_r($figuresArray);
?>

