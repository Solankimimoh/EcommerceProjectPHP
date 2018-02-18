<div class="different_filters_divbox">                                            
	<ul class="different_filters color-filter">
		<?php		
		$p_type_array = $db->getResults('product_type');		
		foreach($p_type_array as $p_typename) {
			$p_type_name = $p_typename['p_type_name'];		
		?>		
		<li>
			<input type="checkbox" id="color-<?=strtolower($p_type_name);?>" name="ccheck" class="ccheck" value="<?=$p_typename['p_type_id']?>"/>
			<label for="color-<?=strtolower($p_type_name);?>"><?=$p_type_name?></label>
		</li>
		
		<?php
		}
		?>
	</ul>
</div>