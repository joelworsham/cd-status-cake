<?php
/*
* Output for main page
*/

function cd_status_cake_page(){
  ?>
  <div class="wrap">
    <h2>Client Dash Status Cake</h2>
    <?php
    cd_create_tab_page(array(
      'tabs' => array(
        'Status' => 'status',
        'Settings' => 'settings',
        'Test' => 'test'
      )
    ));
    ?>
  </div><!--.wrap-->
  <?php
}
?>