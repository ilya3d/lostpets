<?php
use frontend\widgets\CountPets;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

//\yii\bootstrap\BootstrapAsset::register($this);
AppAsset::register($this);
$currentAction = \Yii::$app->controller->id.'/'.\Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="map__wrap">
        <div class="map__wrap2 js-search"></div>
    </div>
    <div class="b-container">
        <div class="container__rama">
            <div class="b-header">
                <a href="/" class="header__logo"><img src="/images/logo.png" alt="" /></a>
                <?php if($currentAction != 'description/add'): ?>
                <a href="/add" class="header__btn">add new record</a>
                <?php endif ?>
                <div class="header__countbox">
                    <div class="header__text">Pets found their home:</div>
                    <div class="header__count"><?= CountPets::widget(); ?></div>
                </div>
            </div>

            <?= $content ?>

            <div class="b-foot">&copy; <?= date('Y') ?> Lost Pets</div>
        </div>
    </div>
    <?php $this->endBody() ?>
    <script data-main="app/config" src="vendor/requirejs/require.js"></script>
</body>
</html>
<?php $this->endPage() ?>
