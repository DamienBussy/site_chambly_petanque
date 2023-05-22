<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<style>
    .bureau {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .col-md-12 {
        margin-top: 30px;
    }

    .col-md-4, .col-md-3, .col-md-2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
    }

    .bureau-item {
        text-align: center;
        width: 100%;
    }

    h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
    }

    ul {
        margin-top: 10px;
        list-style-type: none;
        padding: 0;
    }

    li {
        font-size: 16px;
        margin: 5px;
    }
    .bureau-item {
        text-align: center;
    }

    .bureau-item img {
        max-width: 100px;
        max-height: 100px;
    }

</style>
<div class="bureau">
    <div class="row">
        <div class="col-md-4">
            <div class="bureau-item">
                <h3>Président</h3>
                <?php if(!empty($this->data['president'])):
                    $president = $this->data['president'];?>
                    <div class="bureau-box">
                        <img src="<?= $president->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $president->GetLicencieNom()." ".$president->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="bureau-item">
                <h3>Vice-Président</h3>
                <?php if(!empty($this->data['vicepresident'])):
                    $vicepresident=$this->data['vicepresident']?>
                    <div class="bureau-box">
                        <img src="<?= $vicepresident->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $vicepresident->GetLicencieNom()." ".$vicepresident->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bureau-item">
                <h3>Secrétaire Générale</h3>
                <?php if(!empty($this->data['sercrgene'])):
                    $sercrgene=$this->data['sercrgene'];?>
                    <div class="bureau-box">
                        <img src="<?= $sercrgene->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $sercrgene->GetLicencieNom()." ".$sercrgene->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bureau-item">
                <h3>Trésorière Générale</h3>
                <?php if(!empty($this->data['tresgen'])):
                    $tresgen=$this->data['tresgen']?>
                    <div class="bureau-box">
                        <img src="<?= $tresgen->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $tresgen->GetLicencieNom()." ".$tresgen->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bureau-item">
                <h3>Directeur Sportif</h3>
                <?php if(!empty($this->data['dirsport'])):
                    $dirsport=$this->data['dirsport']?>
                    <div class="bureau-box">
                        <img src="<?= $dirsport->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $dirsport->GetLicencieNom()." ".$dirsport->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="bureau-item">
                <h3>Directeur Sportif Adjoint</h3>
                <?php if(!empty($this->data['dirsportadj'])):
                    $dirsportadj=$this->data['dirsportadj']?>
                    <div class="bureau-box">
                        <img src="<?= $dirsportadj->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $dirsportadj->GetLicencieNom()." ".$dirsportadj->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="bureau-item">
                <h3>Secrétaire Adjoint</h3>
                <?php if(!empty($this->data['secradj'])):
                    $secradj=$this->data['secradj']?>
                    <div class="bureau-box">
                        <img src="<?= $secradj->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $secradj->GetLicencieNom()." ".$secradj->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-2">
            <div class="bureau-item">
                <h3>Initiateur école de pétanque</h3>
                <?php if(!empty($this->data['ecole'])):
                    $ecole=$this->data['ecole']?>
                    <div class="bureau-box">
                        <img src="<?= $ecole->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $ecole->GetLicencieNom()." ".$ecole->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-2">
            <div class="bureau-item">
                <h3>Correspondant Vétérans</h3>
                <?php if(!empty($this->data['veteran'])):
                    $veteran=$this->data['veteran']?>
                    <div class="bureau-box">
                        <img src="<?= $veteran->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $veteran->GetLicencieNom()." ".$veteran->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="bureau-item">
                <h3>Membres bénévoles</h3>
                <?php if(!empty($this->data['benevoles'])):
                $benevoles=$this->data['benevoles']?>
                <ul>
                    <?php foreach($benevoles as $benevole): ?>
                        <img src="<?= $benevole->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p><?= $benevole->GetLicencieNom()." ".$benevole->GetLicenciePrenom() ?></p>
                    <?php endforeach; ?>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once "Views/public/footer.php"; ?>