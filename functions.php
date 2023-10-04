<?php

class CustomPostType{

    public function __construct() {
        add_action('init',array($this,'register_custom_post_type'));
        add_action('init',array($this,'add_taxonomy'));


    }
    public function register_custom_post_type(){

        $args = array(
        
        'labels' => array(
        'name'=>'Products',
        'signular_name' => 'Product',
        
        ),
        
        
        'public' => true,
        'has_archive' => true,
        'supports'=>array('title','thumbnail','editor'),
        'menu_icon'=>'dashicons-products',
        'hierarchical'   => false,
        
        
        
        
        
        );
        
        register_post_type('products',$args);
        
        
        }
        
        

       public function add_taxonomy(){


            $args = array(
        
                'labels' => array(
        
                    'name' =>'Brands',
                 'signular_name' => 'Brand',
                    
                ),
                'public'=>true,
               'hierarchical' => true,
        
        
            );
        
            register_taxonomy('brands', array('products'), $args);

        }
        
}





$custom_post_type = new CustomPostType();




function add_editor_name_metabox(){



    add_meta_box('editor-name-metabox','Editor Name','render_editor_name_metabox','post','side','high');
}
    add_action('add_meta_boxes','add_editor_name_metabox');

    function render_editor_name_metabox($post){

        $editor_name = get_post_meta($post->ID, 'editor_name', true);
        ?>
        <label for="editor-name">Editor Name:</label>
        <input type="text" id="editor-name" name="editor_name" value="<?php echo esc_attr($editor_name); ?>">
        <?php
    }
    
    function save_editor_name($post_id) {
        if (array_key_exists('editor_name', $_POST)) {
            update_post_meta($post_id, 'editor_name', sanitize_text_field($_POST['editor_name']));
    }
}


add_action('save_post','save_editor_name')





?>