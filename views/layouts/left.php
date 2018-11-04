<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    // ['label' => '功能菜单', 'options' => ['class' => 'header']],
                    ['label' => '系统设置', 'icon' => 'fa fa-cogs', 'url' => ['/bemanage/config']],
                    ['label' => '分类管理', 'icon' => 'fa fa-newspaper-o', 'url' => ['/bemanage/category']],
                    ['label' => '轮播图管理', 'icon' => 'fa fa-image', 'url' => ['/bemanage/banner']],
                    ['label' => '关于我们', 'icon' => 'fa fa-flag-o', 'url' => ['/bemanage/about']],
                    ['label' => '服务项目', 'icon' => 'fa fa-play-circle', 'url' => ['/bemanage/service']],
                    ['label' => '新闻中心', 'icon' => 'fa fa-newspaper-o', 'url' => ['/bemanage/news']],
                    ['label' => '产品中心', 'icon' => 'fa fa-cubes', 'url' => ['/bemanage/product']],
                    ['label' => '联系我们', 'icon' => 'fa fa-play-circle', 'url' => ['/bemanage/contact']],
                ],
            ]
        ) ?>

    </section>

</aside>
