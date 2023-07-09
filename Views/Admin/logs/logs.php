<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>

<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>Date & Heure</th>
        <th>Administrateur</th>
        <th>Action réalisé</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesLogs'] as $log){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
            <td class="td-users"><?= $log->getLogDateHeure() ?></td>
            <td class="td-users"><?= $log->getLogAdmin() ?></td>
            <td class="td-users"><?= $log->getLogTitle() ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

