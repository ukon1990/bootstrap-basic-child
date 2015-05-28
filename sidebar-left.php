<?php if (is_active_sidebar('sidebar-left')) { ?>
    <aside>
        <div class="col-md-3" id="sidebar-left">
            <?php do_action('before_sidebar'); ?>

            <!-- Modded category sidebar start -->
            <?php
            if (is_category()) {
                //Adding elements to the category list in articles
                $this_category = get_cat_top_parent(get_query_var('cat'));
                $this_category = wp_list_categories('hide_empty=1&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
                if($this_category !='<li>No categories</li>')
                {
                    echo '<ul>'.replace_category_second_level($this_category).'</ul>';
                }
            }else if (is_page()){
                //Adding elements to the category list on pages
                if(term_exists(get_cat_ID(get_the_title())) == true){ //Checking if there is a category with the page title.
                    $cat = get_cat_ID(get_the_title());// Looking for a category that matches with the page name.
                    $this_category = get_category($cat); //Getting current category
                    $this_category = wp_list_categories('hide_empty=1&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
                    if($this_category !='<li>No categories</li>')
                    {
                        echo '<ul>'.replace_category_second_level($this_category).'</ul>';
                    }
                }
            }else{
                //If something goes wrong, don't add anything.
                //echo '<p>Fix</p>';
            }
            ?>
            <!-- Modded sidebar end-->
        </div>
    </aside>
<?php } ?>