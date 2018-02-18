<div class="different_filters_divbox">                                           
	<ul class="different_filters">
		<?php		
		$catarray = $db->getResults('category');		
		foreach($catarray as $cat) {
			$catname = $cat['cat_name'];		
		?>		
		<li>
		<div class="checkbox checkbox-primary">
			<input type="checkbox" class="styled" type="checkbox"  id="brand-<?=strtolower($catname);?>" name="bcheck" class="bcheck" value="<?=$cat['cat_id']?>" checkboxname="<?=$catname?>" />
			<label for="brand-<?=strtolower($catname);?>"><?=$catname?></label>
			</div>
		</li>
		
		<?php
		}
		?>
		
	</ul>
</div>

