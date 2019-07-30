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
                                    <?php foreach ($items['workPositions'] as $key => $workPosition) : ?>
                                        <option value="<?= $key ?>"><?= $workPosition ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="salary" class="input is-info" type="text" placeholder="Mzda">
                        </div>
                    </div>
                    <button type="submit" class="button">Pridať</button>
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

            <?php foreach ($items['persons'] as $person) : ?>
                <tr>
                    <form method="post" action="../../editPerson.php">
                        <td style="display: none"><input name="id" class="input is-info" type="hidden"
                                                         value="<?= $person->id ?>"></td>
                        <td><input name="prefix_name" class="input is-info" type="text" placeholder="Titul"
                                   value="<?= $person->prefix_name ?>"></td>
                        <td><input name="first_name" class="input is-info" type="text" placeholder="Meno"
                                   value="<?= $person->first_name ?>"></td>
                        <td><input name="last_name" class="input is-info" type="text" placeholder="Priezvisko"
                                   value="<?= $person->last_name ?>"></td>
                        <td><input name="email" class="input is-info" type="text" placeholder="Email"
                                   value="<?= $person->email ?>"></td>
                        <td><input name="phone" class="input is-info" type="text" placeholder="Telefon"
                                   value="<?= $person->phone ?>"></td>
                        <td><input name="work_position_id" class="input is-info" type="text"
                                   placeholder="Pracovna pozicia"
                                   value="<?= $person->work_position_id ?>"><?= $items['workPositions'][$person->work_position_id] ?>
                        </td>
                        <td class="select">
                            <select name="work_position_id">
                                <?php foreach ($items['workPositions'] as $key => $workPosition) : ?>
                                    <?php if ($key == $person->work_position_id) : ?>
                                        <option value="<?= $key ?>" selected="selected"><?= $workPosition ?></option>
                                    <?php else : ?>
                                        <option value="<?= $key ?>"><?= $workPosition ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input name="salary" class="input is-info" type="text" placeholder="Mzda"
                                       value="<?= $person->salary ?>">
                        </td>
                        <td>
                            <button type="submit" class="button is-primary is-small">Editovať</button>
                        </td>
                    </form>
                    <form method="post" action="../../deletePerson.php">
                        <td style="display: none"><input name="id" class="input is-info" type="hidden"
                                                         value="<?= $person->id ?>"></td>
                        <td>
                            <button type="submit" class="button is-danger is-small">Zmazať</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php include_once 'footer.php' ?>