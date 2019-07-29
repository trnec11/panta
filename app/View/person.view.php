<?php
    use App\Controller\PersonController;
    include_once 'header.php';

    $items = PersonController::getIndex();
?>

  <section class="section">
    <div class="container">
      <h1 class="title">
Zamestanci
</h1>
      <p class="subtitle">
Rýchly prehľad
      </p>
    </div>
      <table class="table is-responsive">
          <thead>
          <tr>
              <th>Titul</th>
              <th>Meno</th>
              <th>Priezvisko</th>
              <th>Email</th>
              <th>Telefónne číslo</th>
              <th>Pracovná pozícia</th>
              <th>Výplata</th>
          </tr>
          </thead>
          <tbody>

              <?php foreach ($items as $item) : ?>
              <tr>
                  <td><?= $item->prefix_name ?></td>
                  <td><?= $item->first_name ?></td>
                  <td><?= $item->last_name ?></td>
                  <td><?= $item->email ?></td>
                  <td><?= $item->phone ?></td>
                  <td><?= $item->work_position_id ?></td>
                  <td><?= $item->salary ?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </section>
<?php include_once 'footer.php' ?>