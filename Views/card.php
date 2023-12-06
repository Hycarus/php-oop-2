<div class="col-12 col-md-4 col-lg-3">
    <div class="card my-3 d-inline-block">
        <img src="<?= $image ?>" class="card-img-top my-img-card-top" alt="<?= $title ?>">
        <div class="card-body overflow-y-auto my-card-body">
            <?php
            if (isset($error) && $error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>
            <?php if (isset($title)) { ?>
                <h5 class="card-title">
                    <?= $title ?>
                </h5>
            <?php } elseif (isset($name)) { ?>
                <h5 class="card-title">
                    <?= $name ?>
                </h5>
            <?php } ?>
            <?php if (isset($content)) { ?>
                <p class="card-text my-card-content">
                    <?= $content = substr($content, 0, 150) . '...' ?>
                </p>
            <?php } ?>
            <?php if (isset($authors)) { ?>
                <div class="my-3">
                    Autori:
                    <?php foreach ($authors as $item) { ?>
                        <div>
                            <?= $item ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($playtime)) { ?>
                <div class="my-3">
                    Ore giocate:
                    <?= $playtime ?>
                </div>
            <?php } ?>
            <?php if (isset($categories)) { ?>
                <div class="my-3">
                    Categorie:
                    <?php foreach ($categories as $item) { ?>
                        <div>
                            <?= $item ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($custom)) { ?>
                <div class="d-flex justify-content-between align-items-flex-start">
                    <?php echo $custom ?>
                </div>
            <?php } ?>
            <?php if (isset($genre)) { ?>
                <div>
                    Generi:
                    <?php foreach ($genre as $item) { ?>
                        <div>
                            <?= $item->name ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($flag)) { ?>
                <div class="my-flag my-2">
                    <img class="w-100" src="<?= $flag ?>" alt="">
                </div>
            <?php } ?>
            <div>
                Disponibilità: <?= $quantity ?> Prezzo: <?= $price ?> €
                <?php
                if ($quantity > 0) { ?> <a href="#" class="btn btn-primary my-3">Acquista</a> <?php } ?>
                <?php if ($sconto > 0) { ?> <span class="badge bg-danger">Sconto del <?= $sconto ?>%</span> <?php } ?>
            </div>
        </div>
    </div>
</div>