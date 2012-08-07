<?php if (Config::get('pjax')): ?>
    <?php echo View::make('partials.page_title') ?>
<?php endif; ?>

<?php if (!Config::get('pjax')): ?>

    <?php echo View::make('partials.header') ?>

    <div id="pjax-outer">

<?php endif; ?>

    <!-- Sidebar begins -->
    <div id="sidebar">

        <div class="mainNav">


            <!-- Responsive nav -->
            <div class="altNav">
                <div class="userSearch">
                    <form action="">
                        <input type="text" placeholder="search..." name="userSearch" />
                        <input type="submit" value="" />
                    </form>
                </div>

                <!-- User nav -->
            </div>

            <!-- Main nav -->
            <ul class="nav">
                <li>
                    <a href="/dashboard" class="nav-dashboard <?= URI::is('dashboard') ? "active" : "" ?>" data-pjax="#pjax-outer">
                        <img src="/img/icons/mainnav/dashboard.png" alt="" />
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users')}}" class="nav-users <?= URI::is('users*') ? "active" : "" ?>" data-pjax="#pjax-outer" >
                        <img src="/img/icons/mainnav/ui.png" alt="" />
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pads')}}" data-pjax="#pjax-outer" class="nav-pads <?= URI::is('pads*') ? "active" : "" ?>" >
                        <img src="/img/icons/mainnav/forms.png" alt="" />
                        <span>Pads</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- Secondary nav -->
        <div class="secNav">
             <div class="secWrapper">
                    @yield('sidebar')
              </div>
           <div class="clear"></div>
       </div>

    </div>
    <!-- Sidebar ends -->

    <!-- Content begins -->
    <div id="content">
        <div class="contentTop">


            <div class="clear"></div>
        </div>

        <!-- Main content -->
        <div class="wrapper">

            <div class="fluid">    
                @yield('content')

                <div class="clear"></div>
            </div>

        </div>
        <!-- Main content ends -->

    </div>
    <!-- Content ends -->

<?php if(!Config::get('pjax')): ?>

    </div>

    <?php echo View::make('partials.footer') ?>

<?php endif; ?>
