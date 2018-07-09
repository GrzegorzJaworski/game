<?php
use App\Service\Container;

require '../vendor/autoload.php';

$container = new Container();

$characterLoader = $container->getCharacterLoader();

$heroData = $_POST['hero'] ?? null;
$beastData = $_POST['beast'] ?? null;

if (!$heroData || !$heroData) {
    header('Location: /index.php?error=missing_data');
    die;
}

$hero = $characterLoader->loadHero($heroData);
$beast = $characterLoader->loadBeast($beastData);
//print_r($_POST['hero']);die;
if (!$hero || !$beast) {
    header('Location: /index.php?error=bad_characters');
    die;
}

$battleManager = $container->getBattleManager();

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
    <?php
    $battleResult = $battleManager->battle($hero, $beast);
    ?>
    <div class="card-deck my-3">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4>Winner: <?php echo $battleResult->getWinner()->getName() ?? 'Draw'; ?></h4>
            </div>
            <div class="card-body">
                <h3>Course of the fight:</h3>
                <?php
                foreach ($battleResult->getRounds() as $key => $round){
                ?>
                    <h5>Round <?php echo($key + 1); ?></h5>
                    <p><?php echo $round->getHistory(); ?> </p>
                <?php
                }
                ?>
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