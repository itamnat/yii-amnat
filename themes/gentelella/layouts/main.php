<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet">
</head>

<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>">
    <?php $this->beginBody(); ?>
    <div class="container body" style="font-family: 'Niramit', sans-serif;">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= Yii::$app->homeUrl ?>" class="site_title"><i class="fa fa-paw"></i> <span>ACR2021!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <!-- <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img"> -->
                            <img src="<?= Yii::$app->request->baseUrl . '/user/' . (Yii::$app->user->isGuest ? '128x128.png' : Yii::$app->user->identity->image) ?>" class="img-circle profile_img" alt="User Image" />
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username; ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <?=
                            \yiister\gentelella\widgets\Menu::widget(
                                [
                                    "items" => [
                                        ["label" => "Dashboard", "url" => "index", "icon" => "home"],
                                        ["label" => "สมุดโทรศัพท์", "url" => ["lists/"], "icon" => "files-o"],
                                        // ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                        ['label' => 'เข้าสู่ระบบ', 'icon' => 'fa fa-sign-in', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                                        //Admin
                                        ['label' => 'ตั้งค่า', 'options' => ['class' => 'header'], 'visible' => (!Yii::$app->user->isGuest)],
                                        [
                                            'label' => 'ข้อมูลพื้นฐาน',
                                            'icon' => 'fa fa-share',
                                            'url' => 'Javascript::void()',
                                            'items' =>
                                            [
                                                ['label' => 'ผู้ใช้งาน', 'icon' => 'fa fa-bookmark-o', 'url' => ['/user/index']],
                                                ['label' => 'เพิ่มผู้ใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/user/create']],
                                                ['label' => 'บุคลากร', 'icon' => 'fa fa-bookmark-o', 'url' => ['/brand/index']],
                                                ['label' => 'เพิ่มข้อมูลบุคลากร', 'icon' => 'fa fa-edit', 'url' => ['/brand/create']],
                                                ['label' => 'ส่วนราชการ', 'icon' => 'fa fa-car', 'url' => ['/car/index']],
                                                ['label' => 'กรม/กระทรวง', 'icon' => 'fa fa-edit', 'url' => ['/car/create']],
                                                //['label' => 'รายการบำรุงก่อนใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm1car/index']],
                                                //['label' => 'รายการบำรุงขณะใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm2car/index']],
                                                //['label' => 'รายการบำรุงหลังใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm3car/index']],
                                            ],
                                            'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled == '1')
                                        ],
                                        [
                                            'label' => 'จัดการข้อมูล',
                                            'icon' => 'fa fa-share',
                                            'url' => 'Javascript::void()',
                                            'items' =>
                                            [
                                                ['label' => 'บุคคลากร', 'icon' => 'fa fa-bookmark-o', 'url' => ['/contacts/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled == '2')],
                                                ['label' => 'ตำแหน่ง', 'icon' => 'fa fa-bookmark-o', 'url' => ['/mapcar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled == '2')],
                                                ['label' => 'บันทึกการใช้รถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/usecar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled == '3')],
                                                ['label' => 'บันทึกตำบลเดินทาง', 'icon' => 'fa fa-bookmark-o', 'url' => ['/outcar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled == '3')],

                                            ],
                                            'visible' => (!Yii::$app->user->isGuest)
                                        ],
                                        //Map Google gis
                                        ['label' => 'รายงาน', 'options' => ['class' => 'header'], 'visible' => !Yii::$app->user->isGuest],
                                        [
                                            'label' => 'เล่มสมุดโทรศัพท์',
                                            'icon' => 'fa fa-share',
                                            'url' => 'Javascript::void()',
                                            'items' =>
                                            [
                                                ['label' => 'ไฟล์ PDF', 'icon' => 'fa fa-circle-o', 'url' => ['/report/map']],
                                                ['label' => 'ไฟล์ Excel', 'icon' => 'fa fa-circle-o', 'url' => ['/report/map']],

                                            ],
                                            'visible' => !Yii::$app->user->isGuest
                                        ],
                                        // [
                                        //     'label' => 'รายงานการจ่ายรถ',
                                        //     'icon' => 'fa fa-share',
                                        //     'url' => 'Javascript::void()',
                                        //     'items' =>
                                        //     [
                                        //         ['label' => 'รายงานการจ่ายรถประจำวัน', 'icon' => 'fa fa-circle-o', 'url' => ['/report/outcartoday']],
                                        //     ],
                                        //     'visible' => !Yii::$app->user->isGuest
                                        // ],

                                    ],
                                ]
                            )
                            ?>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <?= Html::a(
                            '',
                            ['/site/logout'],
                            ['data-method' => 'post', 'class' => 'glyphicon glyphicon-off']
                        ) ?>


                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <?php if (!Yii::$app->user->isGuest) : ?>
                            <ul class="nav navbar-nav navbar-right">



                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl . '/user/' . Yii::$app->user->identity->image ?>" class="user-image" alt="User Image" />
                                        <span class="hidden-xs"><?= Yii::$app->user->isGuest ? null : Yii::$app->user->identity->username; ?></span>

                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li>
                                            <img src="<?= Yii::$app->request->baseUrl . '/user/' . Yii::$app->user->identity->image ?>" class="img-circle profile_img" alt="User Image" />

                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <?= Yii::$app->user->isGuest ? null : Yii::$app->user->identity->fullname; ?>
                                            </div>
                                        </li>

                                        <li>
                                            <?= Html::a('ข้อมูลส่วนตัว', ['user/profile']) ?>
                                        </li>

                                        <li>
                                            <div class="">
                                                <?= Html::a(
                                                    'ออกจากระบบ',
                                                    ['/site/logout'],
                                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-sm']
                                                ) ?>
                                        </li>
                </div>
                </ul>
                </li>


                </ul>
            <?php endif; ?>
            </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])) : ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                กลุ่มงานยุทธศาสตร์และข้อมูลเพื่อการพัฒนาจังหวัด <a href="https://amnat.online" rel="nofollow" target="_blank"></a><br />
                สำนักงานจังหวัดอำนาจเจริญ <a href="http://www.amnatcharoen.go.th" rel="nofollow" target="_blank"></a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
    <!-- /footer content -->
    <?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>