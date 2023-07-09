<?php require_once "Views/public/menu.php"?>
<style>
    .sponsor {
        display: inline-block;
        text-align: center;
        margin: 20px;
    }

    .sponsor-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .sponsor-link {
        text-decoration: none;
    }

    .sponsor-image {
        width: 300px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        color: #333;
        margin-top: 120px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px #aaa;
    }

</style>
<h1>Nos Partenaires</h1>
<?php foreach ($this->data['lesPartners'] as $thePartner){ ?>
    <div class="sponsor">
        <h3 class="sponsor-title"><?= $thePartner->getPartnerTitre() ?></h3>
        <a href="<?= $thePartner->getPartnerLink() ?>" class="sponsor-link">
            <img src="<?= $thePartner->getPartnerPicture() ?>" alt="Logo du sponsor" class="sponsor-image">
        </a>
    </div>
<?php } ?>
<?php require_once "Views/public/footer.php" ?>