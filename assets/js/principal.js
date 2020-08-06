
$(document).ready(function() {
	$('#upload').change(function(){
		var reader = new FileReader();
         reader.onload = function(e) {
			  $('.upload div').css('background-image', 'url(' + e.target.result + ')');
			  $('.upload div').addClass('preview');
         };       
         reader.readAsDataURL(this.files[0]);
	});
	var background = "bg_roxo.png";
	$('.container_bgs div').click(function(){
		background = $(this).data('img');
		$('.container_bgs div').each(function(){
			$(this).removeClass('active');
		});
		$(this).addClass('active');
	});

	$("#form").submit(function(){
		var data = new FormData();
		jQuery.each(jQuery('#upload')[0].files, function(i, file) {
			data.append('imagem', file);
		});
		data.append('texto', $('#texto').val());
		data.append('descricao', $('#descricao').val());
		data.append('background', background);
		
		$.ajax({
			type: 'post',
			data: data,
			url: 'gerar.php',
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				var obj = JSON.parse(data);
				if(obj.status == "success"){
					var url_img = obj.imagem;
					var img = $('<img id="image_id">');
					img.attr('src', url_img);
					$('.center').html(img);
					$('.center').removeClass('clear');
				}else{
					alert(obj.error);
				}

			}
		});
	});
});
