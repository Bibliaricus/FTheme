<?php 
/**
 * widget-business-hours.php
 * 
 * Plugin Name: Ftheme_Widget_Business_Hours
 * Plugin URI: localhos
 * Description: A widget that displays businnes hours
 * Version: 1.0
 * Author: Adi Purdila
 * Author URI: http://www.adipurdila.com
 */

 class Ftheme_Widget_Business_Hours extends WP_Widget {
   /**
    * Specifies the widget name, description, class name and instaliates it
    */
    public function __construct() {
      parent::__construct(
        'widget-business-hours',
        __( 'Ftheme: Business Hours', 'ftheme' ),
        array(
          'classname' => 'widget-business-hours',
          'description' => __( 'A custom widget that displays business hours.', 'ftheme' )
        )
        );
    }

/**
 * Generates the back-end layout for the widget
 */
public function form( $instance ) {
  // Default widget settings
  $defaults = array(
    'title' => 'Business Hours',
    'hours_description' => '',
    'hours_monday_friday' => '9am to 5pm',
    'hours_saturday' => 'Closed',
    'hours_sunday' => 'Closed'
  );
  $instance = wp_parse_args( (array) $instance, $defaults );

  // The widget content ?>
  <!-- Title -->
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title: ', 'ftheme' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $defaults['title']; ?>">
  </p>
  <!-- Description -->
  <p>
    <label for="<?php echo $this->get_field_id( 'hours_description' ); ?>"><?php _e( 'Description:', 'ftheme' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hours_description' ); ?>" name="<?php echo $this->get_field_id( 'hours_description' ); ?>" value="<?php echo $defaults['hours_description']; ?>">
  </p>
  <!-- Monday-Friday -->
  <p>
    <label for="<?php echo $this->get_field_id( 'hours_monday_friday' ); ?>"><?php _e( 'Monday-Friday:', 'ftheme' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hours_monday_friday' ); ?>" name="<?php echo $this->get_field_id( 'hours_monday_friday' ); ?>" value="<?php echo $defaults['hours_monday_friday']; ?>">
  </p>
  <!-- Saturday -->
  <p>
    <label for="<?php echo $this->get_field_id( 'hours_saturday' ); ?>"><?php _e( 'Saturday:', 'ftheme' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hours_saturday' ); ?>" name="<?php echo $this->get_field_id( 'hours_saturday' ); ?>" value="<?php echo $defaults['hours_saturday']; ?>">
  </p>
  <!-- Sunday -->
  <p>
    <label for="<?php echo $this->get_field_id( 'hours_sunday' ); ?>"><?php _e( 'Sunday:', 'ftheme' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'hours_sunday' ); ?>" name="<?php echo $this->get_field_id( 'hours_sunday' ); ?>" value="<?php echo $defaults['hours_sunday']; ?>">
  </p><?php
}

/**
 * Processes the widget's value
 */
public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;

  // Update values
  $instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
  $instance['hours_description'] = strip_tags( stripslashes( $new_instance['hours_description'] ) );
  $instance['hours_monday_friday'] = strip_tags( stripslashes( $new_instance['hours_monday_friday'] ) );
  $instance['hours_saturday'] = strip_tags( stripslashes( $new_instance['hours_saturday'] ) );
  $instance['hours_sunday'] = strip_tags( stripslashes( $new_instance['hours_sunday'] ) );

  return $instance;
}
/**
 * Output the contents of the widget
 */
public function widget( $args, $instance ) {
  // Extract the arguments
  extract( $args );

  $title = apply_filters( 'widget_title', $instance['title'] );
  $hours_description = $instance['hours_description'];
  $hours_monday_friday = $instance['hours_monday_friday'];
  $hours_saturday = $instance['hours_saturday'];
  $hours_sunday = $instance['hours_sunday'];

  // Display the markup before the widget (as defined in function.php)

  if ( $title ) {
    echo $before_widget . $title . $after_title;
  }
  if ( $hours_description ) {
    echo '<p>' . $hours_description . '</p>';
  }
  
  echo '<ul>';

  if ( $hours_monday_friday ) : ?>
    <li>
      <span>
        <?php _e( 'Monday-Friday: ', 'ftheme' ); ?></span>
        <?php echo $hours_monday_friday; ?>
    </li>
  <?php endif;

  echo '</ul>';

  // Display the markup after the widget (as defined in functions.php)
  echo $after_widget;
  }
}

//  Register the widget using an annonymous function
add_action ( 'widgets_init', create_function( '', 'register_widget( "Ftheme_Widget_Business_Hours" );' ) );
?>