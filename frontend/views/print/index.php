<div class="b-container">
    <div class="logo"><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/images/logo.png') ?>"></div>
    <div class="quercode"><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/qr/'.$description->qrcode) ?>"></div>
    <div class="g-clear"></div>
    <div class="b-editor">
        <p class="title"><?= $description->title ?></p>
        <p><img src="<?= \Yii::$app->getUrlManager()->createAbsoluteUrl('/uploads/'.$description->photo) ?>" alt="" /></p>
        <p><?= $description->description ?></p>
    </div>
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
</div>