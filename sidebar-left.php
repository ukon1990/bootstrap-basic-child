<?php if (is_active_sidebar('sidebar-left')) { ?>
    <div class="col-md-3" id="sidebar-left">
        <?php do_action('before_sidebar'); ?>

        <!-- Modded category sidebar start -->
        <?php
        if (is_category()) {
            $cat = get_query_var('cat');
            $this_category = get_category($cat);
            $this_category = wp_list_categories('hide_empty=0&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
            if($this_category !='<li>No categories</li>')
            {
                echo '<ul>'.$this_category.'</ul>';
            }
        }else if (is_page()){
            $cat = get_cat_ID(get_the_title());
            $this_category = get_category($cat);
            $this_category = wp_list_categories('hide_empty=0&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
            if($this_category !='<li>No categories</li>')
            {
                echo '<ul>'.$this_category.'</ul>';
            }
        }else{
            echo '<p>Fix</p>';
        }
        ?>
        <!-- Modded sidebar end-->
        <!--
        Removed for now
        <?php dynamic_sidebar('sidebar-left'); ?>
        -->
    </div>
<?php } ?>