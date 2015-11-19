<?php

use Yii;
use yii\helpers\Html;
use file\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo Yii::$app->params['name'];?>">
    <meta name="keywords" content="<?php echo Yii::$app->params['name'];?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="apple-mobile-web-app-title" content="<?php echo Yii::$app->params['name'];?>" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shorticon icon" type="image/x-icon" href="/favicon.ico">
    <link rel="alternate icon" type="image/png" href="/favicon.png">

    <link rel="stylesheet" href="/tools/uikit/css/uikit.almost-flat.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/site.css">

    <script src="/js/jquery-1.7.2.min.js"></script>
    <script src="/tools/uikit/js/uikit.min.js"></script>
    <script src="/tools/uikit/js/components/parallax.min.js"></script>
    <script src="/tools/uikit/js/components/grid.min.js"></script>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?ae0228cbb1d686865a5061ad470ff7e0";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script>

</head>
<body>
    <div class="uk-margin uk-text-contrast uk-text-center uk-flex uk-flex-center uk-flex-middle file-top-image" data-uk-parallax="{bg: '-100', opacity: '0.3'}" style="height: 400px; background-image: url(/img/nature.jpg); background-position: 50% 50%; background-repeat: no-repeat;">
        <div class="uk-width-medium-1-2" data-uk-parallax="{opacity: '1,0', scale: '1,0.5'}">
            <h1 class="uk-hidden-small uk-text-contrast"><?php echo Yii::$app->params['siteTitle'];?></h1>
            <h2 class="uk-visible-small uk-text-contrast"><?php echo Yii::t('app', 'siteTitle')?></h2>
            <p class="uk-text-large">文件中心</p>
        </div>
    </div>

    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
        <?php echo $content; ?>
    </div>

    <footer class="file-footer">
        <div class="uk-container uk-container-center uk-text-center">
            <div class="uk-panel">
                <p>Made by <a href="http://www.helloarron.com" target="_blank">Arron.y</a> 2015.<br>&copy; <a href="http://www.suosikeji.com/" target="_blank">索思科技协会</a>.</p>
                <a href="http://www.suosikeji.com/" target="_blank">
                    <img src="img/logo_source.png" width="90" title="索思科技协会" alt="索思科技协会">
                </a>
            </div>
        </div>
    </footer>

    <script src="/tools/notie/notie.js"></script>

</body>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>