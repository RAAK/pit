<?php
/*
Template Name: Voices 
*/
?>
<?php get_header() ?>
<?php
$num_posts = (wp_count_posts());
if ($_GET['voice_name']) {
    $name = $_GET['voice_name'];
    $name_id = get_cat_ID($name);
} else {
    $name_id = '';
}
?>
<section id="voices_drop_down" >
    <img src="<?php bloginfo('template_url'); ?>/images/drop_down_list_item_bg.png" class="hidden" />
<?php $top_cat = get_cat_ID('Artist Name');
$voices = get_categories('child_of='. $top_cat .''); 
?>
    <span id="drop_down_button">Please Choose A Voice Artist
        <ul id="drop_down_list">
<?php
foreach ($voices as $voice) {
    echo '<li><a href="' . get_permalink() . '?voice_name=' . $voice->slug . '">'. $voice->name . '</a></li>';
}
?>
        </ul>
    </span>
</section>
<div id="cat_container" class="body">
<?php /*get_sidebar ();*/
?>
    <div id="cat_content" style="width:<?php echo (41.625*($num_posts->publish)); ?>em">
        <h2 class="page-title"><span><?php single_cat_title() ?></span></h2>
<?php $categorydesc = category_description();
if ( !empty($categorydesc)) 
    echo ('<div class="category_description">' . $categorydesc . '</div>'); ?>
<?php
/*$cat_id = get_right_cat();*/
$myposts = get_posts('numberposts=0&category='. $name_id .'');
foreach($myposts as $post) {
    setup_postdata($post);
    include('carousel.php');
}
?>
    </div><!-- #content .hfeed -->
    <nav id="paging">
        <div id="gradient_left"><span id="page_left"><a><img class="pngfix" src="<?php bloginfo('template_url'); ?>/images/post_container_gradient_left_arrows_sprite.png" width="125" height="501" /></a></span></div>
        <div id="gradient_right"><span id="page_right"><a><img class="pngfix" src="<?php bloginfo('template_url'); ?>/images/post_container_gradient_right_arrows_sprite.png" width="125" height="501" /></a></span></div>
    </nav>
</div><!-- #container -->
<!--nav id="paging">
    <span id="page_left"><a>&laquo;</a></span><span id="page_right"><a>&raquo;</a></span>
</nav-->

<?php get_footer() ?>
