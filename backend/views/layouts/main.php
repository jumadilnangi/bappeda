<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;

use backend\assets\AppAsset;
use dmstr\web\AdminLteAsset;
use dmstr\helpers\AdminLteHelper;

//if (Yii::$app->controller->action->id === 'login') {
if (Yii::$app->user->isGuest) {
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    AppAsset::register($this);
    AdminLteAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language;?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags();?>
        <title><?php echo Html::encode($this->title);?></title>
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/index.ico" type="image/x-icon" />
        <?php $this->head() ?>
    </head>
    <body class="hold-transition <?php echo AdminLteHelper::skinClass();?> layout-top-nav">
        <div id="isi">
            <?php $this->beginBody() ?>

            <?php
                echo $this->render(
                    'header.php',
                    ['directoryAsset' => $directoryAsset]
                );

                echo $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                );
            ?>
            <?php $this->endBody() ?>
        </div>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>