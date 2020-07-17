// function for checking and unchecking all checkboxes with one click
const deleteCheckbox = (source) => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        // if (checkboxes[i] != source){
            checkboxes[i].checked = source.checked;
       // }
    }
}

// show or hide special attributes depending on selected option value
const showInput = () => {
	const option_value = $('#type').val();
	switch(option_value) {
		case 'DVD-disc':
		  $('.type').hide();
		  $('.size').show();
		  $('.dimensions').hide();
		  $('.weight').hide();
		  $('.prefix').hide();
		break;

		case 'Furniture':
		  $('.type').hide();
		  $('.dimensions').show();
		  $('.size').hide();
		  $('.weight').hide();
		  $('.prefix').hide();
		break;

		case 'Book':
		  $('.type').hide();
		  $('.weight').show();
		  $('.size').hide();
		  $('.dimensions').hide();
		  $('.prefix').hide();
		break;

		default:
		  $('.type').show();
		  $('.size').hide();
		  $('.dimensions').hide();
		  $('.weight').hide();
		  $('.prefix').hide();
		break;
	  }
    }

	// get each checked checkbox value(where product id is stored) and store in to array 
	$('#btn-delete').click(function(){
		if(confirm("Are you sure you want to delete this?")){
			const  id = [];
			$(':checkbox:checked').each(function(i){
				id[i] = $(this).val();
			});

		if(id.length === 0) {
			alert("Please select atleast one checkbox.")
		} else {
			// ajax function which gets url to which the request is send
			// and after delete query is performed reload page
			$.ajax({
				url:'classes/delete_records.php',
				method: 'POST',
				data: {id:id},
				dataType: 'xml',
				 success:function() {
				 	setInterval('location.reload()', 0200);
				 }
			});
		}
		} else {
			return false;
		}
	});

	// after form is submitted fade out success message
    $('.success').delay(1000).fadeOut(4000);

    // make a pointer when hover over text 'Mass Delete Action'
    $('.hover-over-delete').css('cursor', 'pointer');

// if one of the dimensions fields are clicked adds value x to prefix input field
    $(".dimensions").on('click', function () {
  $(".prefix").val('x');
})