<div style="position: sticky; top: 0; z-index:5">

    <div class="sidebar-header">
        <div class="pull-right text-right">
            <div style="font-size: 9pt;">Mon identifiant</div>
            <h4 style="color: #f00;"><?= $_SESSION['Logged']['idMembre']; ?></h4>
        </div>
        <img id="avatar" src="assets/img/avatar.jpg" alt="avatar">

        <h4><?= $_SESSION['Logged']['prenomMembre']; ?></h4>

        <h6 class="ml-1"><?= $_SESSION['Logged']['nomMembre']; ?></h6>

        <div class="pull-right">
            <?php if ($SwitchInterface) : ?>
                <select name="switchLevel" id="switchLevel" onchange="Processing('Changement d\'interface en cours...'); window.location.href='<?= basename($_SERVER['REQUEST_URI']); ?>&switchInterface='+this.options[selectedIndex].value">
                    <?php foreach ($_SESSION['Logged']['levelsMembre'] as $key => $value) : ?>
                        <?php if ($value != 3) : ?>
                            <option style="height: 30px !important;" value="<?= $value; ?>" <?= $_SESSION['Logged']['level'] == $value ? 'selected' : '' ?>>
                                <?= $Statuts[$value]; ?></option>
                        <?php endif;  ?>
                    <?php endforeach;  ?>
                </select>
            <?php else : ?>
                <div style="font-size: 10pt; color: #90d8f5;">
                    <?= $Statuts[$_SESSION['Logged']['level']]; ?>
                </div>
            <?php endif; ?>
        </div>

        <div style="font-weight: 500;" class="ml-1"><?= $_SESSION['Logged']['age']; ?> ans</div>
    </div>

    <table class="tableMembre" style="border-bottom: none;">
        <tr>
            <td onclick="document.getElementById('sidebarCollapse').click();">
                <a href="javascript:void(0)">
                    <i class="fa fa-arrow-circle-o-left fa-2x"></i></i>
                    <div>Fermer</div>
                </a>
            </td>
            <td style="border-left: 1px solid #bbb;" onclick="Processing(); window.location.href='?slug=logout'">
                <a href="javascript:void(0)">
                    <i class="fa fa-sign-out fa-2x"></i>
                    <div>Quitter</div>
                </a>
            </td>
        </tr>
    </table>
</div>