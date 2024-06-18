<?php
    $positionCss = '';

    if ( $atts[ 'position' ] == 'bottomLeft' ) {
        $positionCss = 'left: ' . $atts['distance_from_left'] . 'px; bottom: ' . $atts['distance_from_bottom'] . 'px;';
    } else if ( $atts[ 'position' ] == 'bottomRight' ) {
        $positionCss = 'right: ' . $atts['distance_from_right'] . 'px; bottom: ' . $atts['distance_from_bottom'] . 'px;';
    } else if ( $atts[ 'position' ] == 'topLeft' ) {
        $positionCss = 'left: ' . $atts['distance_from_left'] . 'px; top: ' . $atts['distance_from_top'] . 'px;';
    } else if ( $atts[ 'position' ] == 'topRight' ) {
        $positionCss = 'right: ' . $atts['distance_from_right'] . 'px; top: ' . $atts['distance_from_top'] . 'px;';
    }
?>

<a style="position: fixed; width: auto; z-index: 9999; <?php echo $positionCss ?>" href="<?php echo esc_attr($atts['link']); ?>" target="<?php echo esc_attr($atts['target']); ?>"><div class="chat-bubble-container" style="height: <?php echo esc_attr($atts['size']); ?>px; width: <?php echo esc_attr($atts['size']); ?>px; background-color: <?php echo esc_attr($atts['background_color']); ?>; border: <?php echo esc_attr($atts['border_width']); ?>px solid <?php echo esc_attr($atts['border_color']); ?>; border-radius: <?php echo esc_attr($atts['border_radius']); ?>px; padding: <?php echo esc_attr($atts['padding']); ?>; display: grid; text-align: center;"><p style="margin: auto auto; font-size: <?php echo esc_attr($atts['text_size']); ?>; color: <?php echo esc_attr($atts['text_color']); ?>;"><?php echo esc_attr($atts['text']); ?></p></div></a>