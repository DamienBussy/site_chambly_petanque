<?php require_once "Views/public/menu.php"?>
<style>
    .bureau {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row-bureay {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .col-md-12 {
        margin-top: 40px;
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

    .h3-bureau {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .p-bureau {
        font-size: 16px;
    }

    .ul-bureau {
        margin-top: 10px;
        list-style-type: none;
        padding: 0;
    }

    .li-bureau {
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
    <div class="row-bureay">
        <div class="col-md-4">
            <div class="bureau-item">
                <h3>Président</h3>
                <?php if(!empty($this->data['president'])):
                    $president = $this->data['president'];?>
                    <div class="bureau-box">
                        <img src="<?= $president->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $president->GetLicencieNom()." ".$president->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row-bureay">
        <div class="col-md-3">
            <div class="bureau-item">
                <h3>Vice-Président</h3>
                <?php if(!empty($this->data['vicepresident'])):
                    $vicepresident=$this->data['vicepresident']?>
                    <div class="bureau-box">
                        <img src="<?= $vicepresident->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $vicepresident->GetLicencieNom()." ".$vicepresident->GetLicenciePrenom() ?></p>
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
                        <p class="p-bureau"><?= $sercrgene->GetLicencieNom()." ".$sercrgene->GetLicenciePrenom() ?></p>
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
                        <p class="p-bureau"><?= $tresgen->GetLicencieNom()." ".$tresgen->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bureau-item">
                <h3 class="h3-bureau">Directeur Sportif</h3>
                <?php if(!empty($this->data['dirsport'])):
                    $dirsport=$this->data['dirsport']?>
                    <div class="bureau-box">
                        <img src="<?= $dirsport->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $dirsport->GetLicencieNom()." ".$dirsport->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="bureau-item">
                <h3 class="h3-bureau">Directeur Sportif Adjoint</h3>
                <?php if(!empty($this->data['dirsportadj'])):
                    $dirsportadj=$this->data['dirsportadj']?>
                    <div class="bureau-box">
                        <img src="<?= $dirsportadj->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $dirsportadj->GetLicencieNom()." ".$dirsportadj->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="bureau-item">
                <h3 class="h3-bureau">Secrétaire Adjoint</h3>
                <?php if(!empty($this->data['secradj'])):
                    $secradj=$this->data['secradj']?>
                    <div class="bureau-box">
                        <img src="<?= $secradj->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $secradj->GetLicencieNom()." ".$secradj->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-2">
            <div class="bureau-item">
                <h3 class="h3-bureau">Initiateur école de pétanque</h3>
                <?php if(!empty($this->data['ecole'])):
                    $ecole=$this->data['ecole']?>
                    <div class="bureau-box">
                        <img src="<?= $ecole->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $ecole->GetLicencieNom()." ".$ecole->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-2">
            <div class="bureau-item">
                <h3 class="h3-bureau">Correspondant Vétérans</h3>
                <?php if(!empty($this->data['veteran'])):
                    $veteran=$this->data['veteran']?>
                    <div class="bureau-box">
                        <img src="<?= $veteran->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $veteran->GetLicencieNom()." ".$veteran->GetLicenciePrenom() ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row-bureay">
        <div class="col-md-12">
            <div class="bureau-item">
                <h3 class="h3-bureau">Membres bénévoles</h3>
                <?php if(!empty($this->data['benevoles'])):
                $benevoles=$this->data['benevoles']?>
                <ul class="ul-bureau">
                    <?php foreach($benevoles as $benevole): ?>
                        <img src="<?= $benevole->GetLicenciePhoto() ?>" alt="Photo du président">
                        <p class="p-bureau"><?= $benevole->GetLicencieNom()." ".$benevole->GetLicenciePrenom() ?></p>
                    <?php endforeach; ?>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once "Views/public/footer.php"; ?>