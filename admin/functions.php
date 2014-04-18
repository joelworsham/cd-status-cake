<?php
/*
* All core functions go here
*/

function cd_create_tab_page($options){
  extract($options);

  // Declare static variable
  $first_tab = '';

  /* Create Tab Menu */

  // Get the page for building url
  $page = $_GET['page'];

  // If a tab is open, get it
  if (isset($_GET['tab']))
    $active_tab = $_GET['tab'];
  ?>

  <h2 class="nav-tab-wrapper">
    <?php $i=0; foreach ($tabs as $name => $link): $i++;
      // If first tab and none set, or if active tab is this tab, activate
      if ($i == 1 && !$active_tab || $link == $active_tab)
        $active = 'nav-tab-active';
      else
        $active = '';

      // Save first tab for later
      if ($i == 1)
        $first_tab = $link;

      echo '<a href="?page='.$page.'&tab='.$link.'" class="nav-tab '.$active.'">'.$name.'</a>';
    endforeach; ?>
  </h2>
  <?php

  /* Output Tab Content */

  if (!$active_tab)
    $active_tab = $first_tab;

  // Get content from tab file
  $file_path = plugin_dir_path(__FILE__).'/tabs/tab-'.$active_tab.'.php';
  if (file_exists($file_path))
    include_once(plugin_dir_path(__FILE__).'/tabs/tab-'.$active_tab.'.php');
  else
    echo '<p class="cd-error">No tab page has been created yet!<br/>Please create a page under "/admin/tabs/tab-$tabname.php"</p>';
}

function cd_settings_header($options){
  extract($options);

  global $cd_fields;

  if (isset($_POST["update_settings"])) {
    foreach ($fields as $field):
      $var = esc_attr($_POST[$field]);
      update_option($field, $var);
    endforeach;
    ?>
    <div id="cd-message" class="cd-updated cd-message-closed">Settings saved!</div>
    <?php
  } 

  foreach ($fields as $field):
    $cd_fields[$field] = get_option($field);
  endforeach;

  echo '<form method="POST" action=""><table class="form-table">';
}

function cd_settings_footer(){
  echo '
  </table>
  <p>
    <input type="submit" value="Save settings" class="button-primary"/>
  </p>
  <input type="hidden" name="update_settings" value="Y" />
  </form>
  ';
}
?>