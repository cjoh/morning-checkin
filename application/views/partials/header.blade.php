<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php echo View::make('partials.page_title') ?>

<?= Basset::show('website.css') ?>
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<?= Basset::show('website.js') ?>

</head>

<body class="<?= Section::yield('body_class'); ?>">

<!-- Top line begins -->
<div id="top">
    <div class="wrapper">
        <?php echo View::make('partials.logoheader'); ?>

        <!-- Right top nav -->
        <div class="topNav">
            <ul class="userNav">
                <li><a href="/auth/logout" title="" class="logout"></a></li>
                <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
            </ul>
            <a title="" class="iButton"></a>
            <a title="" class="iTop"></a>
            <div class="topSearch">
                <div class="topDropArrow"></div>
                <form action="">
                    <input type="text" placeholder="search..." name="topSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>

        <!-- Responsive nav -->
        <ul class="altMenu">
            <li><a href="/dashboard" title="">Dashboard</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!-- Top line ends -->
