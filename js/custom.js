$('#search').keyup(function(){
	var s = $('#search').val();
	//alert(search);

$.ajax({
url:'fetch.php',
data:'usearch='+s,
success:function(data){
	$('#feedback').html(data);
}

});


});



