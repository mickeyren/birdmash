<!-- This file is used to markup the administration form of the widget. -->
<?php
  $usernames = !empty( $instance['usernames'] ) ? $instance['usernames'] : ''; ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'usernames' ); ?>">Comma seperated usernames:</label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'usernames' ); ?>" name="<?php echo $this->get_field_name( 'usernames' ); ?>" value="<?php echo esc_attr( $usernames ); ?>" />
  </p><?php
?>
