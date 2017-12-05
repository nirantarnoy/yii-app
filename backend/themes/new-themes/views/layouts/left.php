<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
    <!--   <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="ค้นหา..."/>
                
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                   // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                   // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'จัดการข้อมูลพื้นฐาน',
                        'icon' => 'arrow-down',
                        'url' => '#',
                        'items' => [
                            ['label' => 'สารเคมี', 'icon' => 'folder-open', 'url' => ['/BasicData/chemical'],],
                            ['label' => 'เกรดสารเคมี', 'icon' => 'folder-open', 'url' => ['/BasicData/grade'],],
                            ['label' => 'ห้องเก็บสารเคมี', 'icon' => 'folder-open', 'url' => ['/BasicData/room'],],
                            ['label' => 'หมวดหมู่สารเคมี', 'icon' => 'folder-open', 'url' => ['/BasicData/category'],],
                            ['label' => 'ประเภทสารเคมี', 'icon' => 'folder-open', 'url' => ['/BasicData/type'],],
                            
                        ],
                    ],
                    [
                        'label' => 'จัดการสารเคมี',
                        'icon' => 'arrow-down',
                        'url' => '#',
                        'items' => [
                            ['label' => 'รายละเอียดสารเคมี', 'icon' => 'folder-open', 'url' => ['/ChemicalsManagement/item'],],
                            ['label' => 'Marker', 'icon' => 'folder-open', 'url' => ['/ChemicalsManagement/marker'],],
              
                        ],
                    ],
                    [
                        'label' => 'จัดการสต๊อกสารเคมี',
                        'icon' => 'arrow-down',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'การเบิกสารเคมี', 'icon' => 'folder-open', 'url' => ['/StockManagement/requisition'],],
                            // ['label' => 'การคืนสารเคมี', 'icon' => 'folder-open', 'url' => ['/StockManagement/repatriate'],],
                              ['label' => 'การเบิกสารเคมี', 'icon' => 'folder-open', 'url' => ['/Journal/issue'],],
                            ['label' => 'การคืนสารเคมี', 'icon' => 'folder-open', 'url' => ['/Journal/return'],],
              
                        ],
                    ],
                    [
                        'label' => 'รายงาน',
                        'icon' => 'arrow-down',
                        'url' => '#',
                        'items' => [
                            ['label' => 'สารเคมีหมดอายุ', 'icon' => 'folder-open', 'url' => ['/ChemicalsManagement/item'],],
                            ['label' => 'สารเคมีใกล้หมดอายุ', 'icon' => 'folder-open', 'url' => ['/ChemicalsManagement/marker'],],
                            ['label' => 'สารเคมีหมดอายุ', 'icon' => 'folder-open', 'url' => ['/ChemicalsManagement/marker'],],
                        ],
                    ],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
