<?php if($post->post_parent) {
    $parent_title = get_the_title($post->post_parent);
    echo '<p class="subpage__navigation">'. $parent_title .'</p>';
} ?>

<?php if(!$post->post_parent){
    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
    $ancestors = $post->ID;
} else {
    if($post->ancestors){
        $ancestors = end(get_post_ancestors( $post->ID ));
        $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
    }
}
if ($children) { ?>
    <ul class="subpage__nav">
        <?php echo $children; ?>
    </ul>
<?php } ?>
