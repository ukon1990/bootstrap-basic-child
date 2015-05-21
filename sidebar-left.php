<?php if (is_active_sidebar('sidebar-left')) { ?>
    <div class="col-md-3" id="sidebar-left">
        <?php do_action('before_sidebar'); ?>

        <!-- Modded category sidebar start -->
        <?php
        if (is_category()) {
            //Getting a string list with parents
            $parents = get_category_parents(get_query_var('cat'));
            //Turning it into an array
            $arrayen = explode('/', $parents);
            //Getting the top parent of the category, and makes sure that it always shows all the categories and getting the top parent's ID.
            $cat = get_cat_ID($arrayen[0]);
            $this_category = get_category($cat);
            $this_category = wp_list_categories('hide_empty=0&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
            if($this_category !='<li>No categories</li>')
            {
                //printing out the list
                echo '<ul>'.$this_category.'</ul>';
            }
        }else if (is_page()){
            if(term_exists(get_cat_ID(get_the_title())) == true){ //Checking if there is a category with the page title.
                $cat = get_cat_ID(get_the_title());// Looking for a category that matches with the page name.
                $this_category = get_category($cat); //Getting current category
                $this_category = wp_list_categories('hide_empty=0&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
                if($this_category !='<li>No categories</li>')
                {
                    echo '<ul>'.$this_category.'</ul>';
                }
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