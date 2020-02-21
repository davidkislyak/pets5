<?php

class PetController
{
    private $_f3; //Router



    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        echo "<h1>MY PETS</h1>";
        echo "<a href = 'order'>Order a Pet</a>";
    }

    public function order1($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $animal = $_POST['animal'];
            $_SESSION['animalType'] = $animal;
            if (validString($animal)) {
                $_SESSION['animal'] = $animal;

                if ($animal == "dog") {
                    $animal = new dog($animal);
                } else if ($animal == "cat") {
                    $animal = new cat($animal);
                } else if ($animal == "bat") {
                    $animal = new bat($animal);
                } else {
                    $animal = new pet($animal);
                }

                $_SESSION['animal'] = $animal;

                $f3->reroute('/order2');
            } else {
                $f3->set("errors['animal']", "Please enter an animal.");
            }
        }

        $view = new Template();
        echo $view->render('views/form1.html');
    }

    public function order2($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $color = $_POST['color'];
            if (validColor($color)) {
            	$type = $_SESSION['animalType'];
                $_SESSION['animal']->setColor($color);
                $_SESSION['animal']->setType($type);
                $_SESSION['animal']->setName($name);
                $f3->reroute('/results');
            } else {
                $f3->set("errors['color']", "Please select a color.");
            }
        }

        $template = new Template();
        echo $template->render('views/form2.html');
    }

    public function view() {
		$pets = $GLOBALS['db']->getData();

		$this->_f3->set('pets', $pets);

		$template = new Template();
    	echo $template->render('views/viewPets.html');

	}

    public function results()
    {
    	$GLOBALS['db']->writePet();

        $view = new Template();
        echo $view->render('views/results.html');
    }
}