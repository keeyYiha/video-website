<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 935px;">
    <a href="/" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <nav class="mt-2">
        <?= 
            \backend\components\widgets\Menu::widget([
                'items' => $leftMenu
            ]);
        ?>
        </nav>
    </div>
</aside>