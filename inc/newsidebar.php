<?php
if (is_category()) {
    $cat = get_query_var('cat');
    $this_category = get_category($cat);
    $this_category = wp_list_categories('hide_empty=0&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
    if($this_category !='<li>No categories</li>')
    {
        echo '<h3>Products</h3>';
        echo '<ul>'.$this_category.'</ul>';
    }
}
?>