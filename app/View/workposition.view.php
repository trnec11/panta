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