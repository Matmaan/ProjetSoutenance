<?php $this->layout('layout', ['title' => 'Exploration']) ?>

<?php $this->start('main_content') ?>
<div class="row explo">
    <div class="col-md-8 col-md-offset-2">

        <h2 class="text-center">Exploration</h2><br>
        <p>Vous pouvez envoyer un groupe de campeurs découvrir les environs. Par soucis de discrétion, ils partiront dans la nuit. Vous aurez un rapport à leur retour.</p><br>
        <form method="POST">
            <div class="form-group">
                <label for="campers">Combien de campeurs voulez-vous envoyez en exploration ? </label>
                <div>
                    <input type="text" id="campers" name="campers" class="form-control">
                </div>
                <small>(Attention, s'aventurer dans ce nouveau monde peut être dangereux, il est déconseillé d'envoyer tous vos campeurs)</small>
            </div>
            <div class="error">
                <?php if (isset($errors))
                    echo "<span class=\"text-danger\">"
                    .$DefaultModel->printError($errors, "campers")
                    ."</span>";
                ?>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Valider</button>
            </div>
        </form>
        <?php if ($w_user['attacking_campers']): ?>
            <p>Vous avez actuellement <?=$w_user['attacking_campers']?> campeurs prêt à partir.</p>
        <?php endif; ?>
    </div>
</div>
<?php $this->stop('main_content') ?>
