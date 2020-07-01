<?php 
  /*
   * Variabel $sidebarnya diambil dari libraries admin_template.php
   * (application/libraries/admin_template.php)
   * */
  echo $sidebarnya; ?>


<?php
  echo '<div id="content-wrapper" class="d-flex flex-column">';
  

?>

<?php 
  /*
   * Variabel $headernya diambil dari libraries admin_template.php
   * (application/libraries/admin_template.php)
   * */
  echo $headernya; ?>



<?php
  echo '
    <div id="loader" style="position: fixed;top: 50%;left: 50%;">
    	<div class="d-flex justify-content-center" >
    		<div class="spinner-border" style="width: 4rem; height: 4rem;" role="status">
    			<span class="sr-only">Loading...</span>
    		</div>
    	</div>
    </div>
  ';
?>

<?php echo '
  <div id="my-content" style="display:none;">
  	
  ';
?>
  <?php 
  /*
   * Variabel $contentnya diambil dari libraries admin_template.php
   * (application/libraries/admin_template.php)
   * */
  echo $contentnya; ?>

<?php 
  /*
   * Variabel $footernya diambil dari libraries admin_template.php
   * (application/libraries/admin_template.php)
   * */
  echo $footernya; ?>

<?php
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  
 
?>

<?php
  /* variable $mdals diambil dari library admin_template

  */
  echo $modals;



?>

<?php
  echo $scripts;
?>

