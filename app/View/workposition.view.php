<?php
use App\Controller\WorkPositionController;
include_once 'header.php';

$items = WorkPositionController::getIndex();
?>

    <section class="section">
        <div class="container">
            <h1 class="title">
                Pracovné pozície
            </h1>
            <p class="subtitle">
                Rýchly prehľad
            </p>
        </div>

        <hr>


        <div class="columns">
            <div class="column is-two-fifths">
                <form method="post" action="../../add.php">
                    <div class="field">
                        <p class="subtitle">
                            Pridať pracovnú pozíciu
                        </p>
                        <div class="control">
                            <input name="title" class="input is-primary" type="text" placeholder="Pracovná pozícia">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="salary" class="input is-info" type="text" placeholder="Mzda">
                        </div>
                    </div>
                    <button type="submit" class="button">Ok</button>
                </form>
            </div>
        </div>


        <table class="table is-responsive">
            <thead>
            <tr>
                <th>Názov</th>
                <th>Výplata</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item->title ?></td>
                    <td><?= $item->salary ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php include_once 'footer.php' ?>