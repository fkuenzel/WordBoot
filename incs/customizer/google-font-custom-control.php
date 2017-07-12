<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $fonts = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->fonts = $this->get_fonts();
        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content() {
        if(!empty($this->fonts)) {
			sort($this->fonts);
			
            ?>
                <label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( $this->description ) { ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
                    <div class="customize-control-content">
						<select <?php $this->link(); ?>>
							<option value='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'">Bootstrap4 Default</option>
                        <?php
                            foreach ( $this->fonts as $k => $v )
                            {
                                printf('<option value="%s" %s>%s</option>', $v->family, selected($this->value(), $k, false), $v->family);
                            }
                        ?>
						</select>
					</div>
                </label>
            <?php
        }
    }

    /**
     * Get the google fonts from the API or in the cache
     *
     * @param  integer $amount
     *
     * @return String
     */
    public function get_fonts( $amount = 100 )
    {
        $fontFile = get_parent_theme_file_path( '/incs/customizer/cache/google-web-fonts.txt');

        //Total time the file will be cached in seconds, set to a week
        $cachetime = 86400 * 0;

        if(file_exists($fontFile) && $cachetime < filemtime($fontFile))
        {
            $content = json_decode(file_get_contents($fontFile));
        } else {

            $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=AIzaSyDLgEaZH2kpks9ujW9tIAct8apn0sVzIbI';

            $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );

            $fp = fopen($fontFile, 'w');
            fwrite($fp, $fontContent['body']);
            fclose($fp);

            $content = json_decode($fontContent['body']);
        }

        if($amount == 'all')
        {
            return $content->items;
        } else {
            return array_slice($content->items, 0, $amount);
        }
    }
 }
?>