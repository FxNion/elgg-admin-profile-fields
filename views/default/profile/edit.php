<?php

	/**
	 * This profile edit form, take account of admin profile fields .
	 * It is very similar to the initial Elgg profile edit form
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Fx NION <fx.nion@free.fr>
	 * @copyright Curverider Ltd 2008
	 * @link http://fxnion.free.fr/
	 *
	 */

?>

<form action="<?php echo $vars['url']; ?>action/profile/edit" method="post">
<?php echo elgg_view('input/securitytoken') ?>
<?php

	//var_export($vars['profile']);
	if (is_array($vars['config']->profile) && sizeof($vars['config']->profile) > 0)
		foreach($vars['config']->profile as $shortname => $valtype) {
			if ($metadata = get_metadata_byname($vars['entity']->guid, $shortname)) {
				if (is_array($metadata)) {
					$value = '';
					foreach($metadata as $md) {
						if (!empty($value)) $value .= ', ';
						$value .= $md->value;
						$access_id = $md->access_id;
					}
				} else {
					$value = $metadata->value;
					$access_id = $metadata->access_id;
				}
			} else {
				$value = '';
				$access_id = 1;
			}
     
?>



<?php if (strpos($shortname, 'admin_') === FALSE  || isadminloggedin()){  ?>
	<p>
		<label>
			<?php echo elgg_echo("profile:{$shortname}") ?><br />
			<?php echo elgg_view("input/{$valtype}",array(
															'internalname' => $shortname,
															'value' => $value,
															)); ?>
		</label>
			<?php echo elgg_view('input/access',array('internalname' => 'accesslevel['.$shortname.']', 'value' => $access_id)); ?>
	</p>
	<?php }else{ ?>
		  <?php echo elgg_view("input/hidden",array('internalname' => $shortname, 'value' => $value,)); ?>
      <?php echo elgg_view('input/hidden',array('internalname' => 'accesslevel['.$shortname.']', 'value' => $access_id)); ?>
  <?php } ?>
<?php } ?>

	<p>
		<input type="hidden" name="username" value="<?php echo page_owner_entity()->username; ?>" />
		<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
	</p>

</form>
