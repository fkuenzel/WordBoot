<?php
// Custom control for carousel category
 
if (class_exists('WP_Customize_Control')) {
    class wb_child_post_slider extends WP_Customize_Control {
 
        public function render_content() {
   
            $dropdown = wp_dropdown_categories( 
                array(
                    'name'              => '_customize-dropdown-category-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'bs4_lang' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                     
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
  
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}
?>