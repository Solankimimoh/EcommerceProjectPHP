$(document).ready(function() {
    function showValues() {
		$("#productContainer").css("opacity",0.5);
		$("#loaderID").css("opacity",1);
		
		//e.css('visibility','visible');
		
				
		var mainarray = new Array();
		
		var brandarray = new Array();		
		$('input[name="bcheck"]:checked').each(function(){			
			brandarray.push($(this).val());		
			$('.spanbrandcls').css('visibility','visible');			
			//alert($(this).attr("checkboxname"));	
		});
		if(brandarray=='') $('.spanbrandcls').css('visibility','hidden');
		var brand_checklist = "&bcheck="+brandarray;
				
		var sizearray = new Array();		
		$('input[name="scheck"]:checked').each(function(){			
			sizearray.push($(this).val());	
			$('.spansizecls').css('visibility','visible');	
		});
		if(sizearray=='') $('.spansizecls').css('visibility','hidden');
		var size_checklist = "&scheck="+sizearray;
		
		
		var colorarray = new Array();		
		$('input[name="ccheck"]:checked').each(function(){			
			colorarray.push($(this).val());
			$('.spancolorcls').css('visibility','visible');		
		});
		if(colorarray=='') $('.spancolorcls').css('visibility','hidden');
		var color_checklist = "&ccheck="+colorarray;
		
		
		var pricearray = new Array();		
		$('input[name="price_range"]:checked').each(function(){			
			pricearray.push($(this).val());
			$('.spanpricecls').css('visibility','visible');		
		});
		if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
		var price_checklist = "&price_range="+pricearray;
		
		var main_string = brand_checklist+size_checklist+color_checklist+price_checklist;
		main_string = main_string.substring(1, main_string.length)
		//alert(main_string);
		
		
		$.ajax({
			type: "POST",
			url: "filter_products.php",
			data: main_string, 
			cache: false,
			success: function(html){
				//alert(html);
				$("#productContainer").html(html);		
				$("#productContainer").css("opacity",1);
				$("#loaderID").css("opacity",0);
				
				
				
			}
			});
		
		
	}
	
	$("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
	
	
	$(".spanbrandcls").click(function(){
		$('.bcheck').removeAttr('checked');				
		showValues();
		$('.spanbrandcls').css('visibility','hidden');
	});
	$(".spansizecls").click(function(){
		$('.scheck').removeAttr('checked'); 
		showValues();
		$('.spansizecls').css('visibility','hidden');
	});
	$(".spancolorcls").click(function(){
		$('.ccheck').removeAttr('checked'); showValues();
		$('.spancolorcls').css('visibility','hidden');
	});
	$(".spanpricecls").click(function(){
		$('.price_range').removeAttr('checked'); showValues();
		$('.spanpricecls').css('visibility','hidden');
	});
	$(".clear_filters").click(function(){
		$('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
		$('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
		showValues();
	});
	
});	