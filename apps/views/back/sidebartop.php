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
                        <option style="height: 30px !important;" value="<?= $value; ?>" <?= $_SESSION['Logged']['level'] == $value ? 'selected' : '' ?>>
                            <?= $Statuts[$value]; ?></option>
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

    <section style="padding: 15px 10px 20px; color: #fff;" class="grady-dark">
        <div style="font-size: 10pt; margin-bottom: 5px;" class="text-center">
            SESSION EN COURS
        </div>
        <select name="selectSession" id="selectSession" style="background: transparent; outline: none; width: 100%; color: #f0e986; border: none; text-align: center; font-size: 15pt; padding: 0;">
            <option value=""></option>
            <option style="color: #333;" value="1" selected>2023/2024</option>
            <option style="color: #333;" value="1">2024/2025</option>
        </select>
    </section>
</div>