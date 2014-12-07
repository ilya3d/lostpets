<div class="b-container ca-paper">
    <div class="logo"><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/images/logo.png') ?>"></div>
    <div class="g-clear"></div>
    <div class="b-editor">
        <p class="title"><?= $description->title ?></p>
        <div class="quercode"><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/qr/'.$description->qrcode) ?>"></div>
        <?php if($description->photo): ?>
        <p><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/uploads/'.$description->photo) ?>" alt="" /></p>
        <?php endif ?>
        <p><?= $description->description ?></p>
    </div>

    <?php if($description->phone): ?>
    <div class="b-phonebox">

        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>
        <div class="phonebox__item"><span>тел.: <?= $description->phone ?></span></div>

    </div>
    <? endif ?>
</div>