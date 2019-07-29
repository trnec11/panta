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

     <div class="columns">
          <div class="column is-two-fifths">
              <form method="post" action="../../addPerson.php">
                  <div class="field">
                      <p class="subtitle">
                          Pridať pracovnú pozíciu
                      </p>
                      <div class="control">
                          <input name="prefix_name" class="input is-primary" type="text" placeholder="Titul">
                      </div>
                  </div>
                  <div class="field">
                      <div class="control">
                          <input name="first_name" class="input is-info" type="text" placeholder="Meno">
                      </div>
                  </div>
                  <div class="field">
                      <div class="control">
                          <input name="last_name" class="input is-info" type="text" placeholder="Priezvisko">
                      </div>
                  </div>
                  <div class="field">
                      <div class="control">
                          <input name="email" class="input is-info" type="text" placeholder="Email">
                      </div>
                  </div>
                  <div class="field">
                      <div class="control">
                          <input name="phone" class="input is-info" type="text" placeholder="Telefónne číslo">
                      </div>
                  </div>
                  <div class="field">
                      <div class="control">
                          <div class="select">
                              <select name="work_position_id">
                                  <option>Select dropdown</option>
                                  <option>With options</option>
                              </select>
                          </div>
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