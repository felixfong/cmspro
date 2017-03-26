<!-- fxc -->
<link href="/css/style.min.css" rel="stylesheet">
<!-- end -->
<?php
use mdm\admin\components\MenuHelper;
use dmstr\widgets\Menu;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!--
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>权限控制</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="/admin">管理员</a>
                        <ul class="treeview-menu">
                            <li><a class="J_menuItem" href="/admin/user"><i class="fa fa-circle-o"></i> 后台用户</a></li>
                            <li class="treeview">
                                <a href="/admin/role">
                                    <i class="fa fa-circle-o"></i> 权限 <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a class="J_menuItem" href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>
                                    <li><a class="J_menuItem" href="/admin/permission"><i class="fa fa-circle-o"></i> 权限</a></li>
                                    <li><a class="J_menuItem" href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>
                                    <li><a class="J_menuItem" href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>
                                    <li><a class="J_menuItem" href="/admin/menu"><i class="fa fa-circle-o"></i> 菜单</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        -->
        <?=
        Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
        ]);
        ?>
    </section>

</aside>

<div class="content-wrapper">
    <div id="" class="gray-bg dashbard-1">
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="htpp://www.yii.cc/admin/site/index">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row J_mainContent" id="content-main" style="margin-left: -230px;">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="htpp://www.yii.cc/admin/site/index" frameborder="0" data-id="htpp://www.yii.cc/admin/site/index" seamless></iframe>
        </div>
    </div>

</div>

<script src="/js/jquery.slimscroll.min.js"></script>
<script src="/js/jquery.metismenu.js"></script>
<script src="/js/contabs.min.js"></script>
<script src="/js/pace.min.js"></script>
<script>
    $(".J_menuItem").click(function(){
		$("#content-main").height($(window).height()-$(".main-header").outerHeight()-$(".content-tabs").outerHeight()-$(".main-footer").outerHeight()-5);
        $(this).parent().siblings().removeClass("active");
        $(this).parents("li").addClass("active");
    })
</script>
