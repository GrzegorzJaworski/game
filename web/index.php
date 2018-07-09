<?php

use App\Service\Container;

require '../vendor/autoload.php';

$container = new Container();

$characterLoader = $container->getCharacterLoader();

$hero = $characterLoader->createHero();
$beast = $characterLoader->createBeast();

$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'missing_data':
            $errorMessage = 'One of the characters run away';
            break;
        case 'bad_characters':
            $errorMessage = 'An unpredictable character appeared';
            break;
        default:
            $errorMessage = 'There was problems. Try again.';
    }
}
?>

<!doctype html>
<html lang="pl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Hero!</title>
</head>
<body>
<div class="container">
    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage ?>
        </div>
    <?php endif; ?>
    <div class="card-deck my-3">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4><?php echo $hero->getName(); ?></h4>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-9">Health</dt>
                    <dd class="col-sm-3"><?php echo $hero->getHealth(); ?></dd>

                    <dt class="col-sm-9">Streangth</dt>
                    <dd class="col-sm-3"><?php echo $hero->getStrength(); ?></dd>

                    <dt class="col-sm-9">Defence</dt>
                    <dd class="col-sm-3"><?php echo $hero->getDefence(); ?></dd>

                    <dt class="col-sm-9">Speed</dt>
                    <dd class="col-sm-3"><?php echo $hero->getSpeed(); ?></dd>

                    <dt class="col-sm-9">Luck</dt>
                    <dd class="col-sm-3"><?php echo $hero->getLuck(); ?></dd>
                </dl>
            </div>
        </div>
        <form class="my-auto" method="post" action="/battle.php">
            <input type="hidden" name="hero[name]" value="<?php echo $hero->getName(); ?>">
            <input type="hidden" name="hero[health]" value="<?php echo $hero->getHealth(); ?>">
            <input type="hidden" name="hero[strength]" value="<?php echo $hero->getStrength(); ?>">
            <input type="hidden" name="hero[defence]" value="<?php echo $hero->getDefence(); ?>">
            <input type="hidden" name="hero[speed]" value="<?php echo $hero->getSpeed(); ?>">
            <input type="hidden" name="hero[luck]" value="<?php echo $hero->getLuck(); ?>">
            <input type="hidden" name="beast[name]" value="<?php echo $beast->getName(); ?>">
            <input type="hidden" name="beast[health]" value="<?php echo $beast->getHealth(); ?>">
            <input type="hidden" name="beast[strength]" value="<?php echo $beast->getStrength(); ?>">
            <input type="hidden" name="beast[defence]" value="<?php echo $beast->getDefence(); ?>">
            <input type="hidden" name="beast[speed]" value="<?php echo $beast->getSpeed(); ?>">
            <input type="hidden" name="beast[luck]" value="<?php echo $beast->getLuck(); ?>">
            <button type="submit" class="btn btn-danger">Fight!</button>
        </form>

        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4><?php echo $beast->getName(); ?></h4>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-9">Health</dt>
                    <dd class="col-sm-3"><?php echo $beast->getHealth(); ?></dd>

                    <dt class="col-sm-9">Streangth</dt>
                    <dd class="col-sm-3"><?php echo $beast->getStrength(); ?></dd>

                    <dt class="col-sm-9">Defence</dt>
                    <dd class="col-sm-3"><?php echo $beast->getDefence(); ?></dd>

                    <dt class="col-sm-9">Speed</dt>
                    <dd class="col-sm-3"><?php echo $beast->getSpeed(); ?></dd>

                    <dt class="col-sm-9">Luck</dt>
                    <dd class="col-sm-3"><?php echo $beast->getLuck(); ?></dd>
                </dl>
            </div>
        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>
</html>