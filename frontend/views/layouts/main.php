<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
    <div class="b-container">
        <div class="container__rama">
            <div class="b-header">
                <a href="/" class="header__logo"><img src="/images/logo.png" alt="" /></a>
                <a href="/" class="header__btn">add new record</a>
                <div class="header__login"><a href="#">Sign up</a><span class="header__logindot">/</span><a href="#">Login</a></div>
                <div class="header__countbox">
                    <div class="header__text">Find your home pets:</div>
                    <div class="header__count"><img src="/images/counter.png" alt="" /></div>
                </div>
            </div>

            <?= Alert::widget() ?>
            <?= $content ?>

            <div class="b-foot">&copy; <?= date('Y') ?> Lost Pets</div>
        </div>
    </div>
    <?php $this->endBody() ?>
    <script data-main="app/config" src="vendor/requirejs/require.js"></script>
</body>
</html>
<?php $this->endPage() ?>
