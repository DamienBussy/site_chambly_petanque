<?php //require_once "Views/public/menu.php"?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<style>
    .year-wrapper {
        text-align: center;
        background-color: #e8b0b0; /* Couleur de fond pour les années */
        /* Autres styles si nécessaire */
    }

    .month-wrapper {
        text-align: center;
        background-color: #94dada; /* Couleur de fond pour les mois */
        /* Autres styles si nécessaire */
    }
</style>
<?php
$eventsByYearAndMonth = array();

foreach ($this->data['lesEvents'] as $event) {
    $date = $event->getEventDate();
    $year = date('Y', strtotime($date));
    $month = date('F', strtotime($date));

    $eventsByYearAndMonth[$year][$month][] = $event;
}

function sortMonths($a, $b)
{
    $monthOrder = array(
        'January' => 1,
        'February' => 2,
        'March' => 3,
        'April' => 4,
        'May' => 5,
        'June' => 6,
        'July' => 7,
        'August' => 8,
        'September' => 9,
        'October' => 10,
        'November' => 11,
        'December' => 12
//        'Janvier' => 1,
//        'Févrié' => 2,
//        'Mars' => 3,
//        'Avril' => 4,
//        'Mai' => 5,
//        'Juin' => 6,
//        'Juillet' => 7,
//        'Août' => 8,
//        'Septembre' => 9,
//        'Octobre' => 10,
//        'Novembre' => 11,
//        'Décembre' => 12
    );

    return $monthOrder[$a] - $monthOrder[$b];
}

?>

<section class="s-content s-content--no-top-padding">
    <?php
    foreach ($eventsByYearAndMonth as $year => $months) {
        ?>

        <!-- masonry -->
        <div class="s-bricks">
            <div class="year-wrapper">
                <h2><?= $year ?></h2>
            </div>

            <?php
            uksort($months, 'sortMonths');

            foreach ($months as $month => $events) {
                ?>
                <div class="month-wrapper">
                    <h3><?= $month ?></h3>
                </div>
                <div class="masonry">
                    <div class="bricks-wrapper h-group">
                        <div class="grid-sizer"></div>
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <?php
                        foreach ($events as $event) {
                            $path = $event->getPathImagePrincipale();
                            ?>

                            <article class="brick entry" data-aos="fade-up">
                                <div class="entry__thumb">
                                    <a href="indexpublic.php?page=evt_eventDetails&id=<?= $event->getEventId() ?>" class="thumb-link">
                                        <img src="<?= $path ?>" alt="">
                                    </a>
                                </div> <!-- end entry__thumb -->
                                <div class="entry__text">
                                    <div class="entry__header">
                                        <h1 class="entry__title"><?= $event->getEventTitle() ?></h1>
                                    </div>
                                </div>
                            </article>

                            <?php
                        }
                        ?>

                    </div> <!-- end bricks-wrapper -->
                </div> <!-- end masonry -->
                <?php
            }
            ?>

        </div> <!-- end s-bricks -->

        <?php
    }
    ?>
</section>



<?php require_once "Views/public/footer.php"; ?>


