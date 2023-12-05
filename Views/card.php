<div class="col-12 col-md-4 col-lg-3">
    <div class="card my-3 ">
        <img src="<?= $image ?>" class="card-img-top my-img-card-top" alt="<?= $title ?>">
        <div class="card-body overflow-y-auto my-card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text my-card-content">
                <?= $content ?>
            </p>
            <div class="d-flex justify-content-between align-items-flex-start">
                <?= $custom ?>
            </div>
            <div>
                Generi:
                <?php foreach ($genre as $item) { ?>
                    <div>
                        <?= $item->name ?>
                    </div>
                <?php } ?>
            </div>
            <div class="my-flag">
                <img class="w-100" src="<?= $flag ?>" alt="">
            </div>
        </div>
    </div>
</div>