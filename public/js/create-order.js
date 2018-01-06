function clearProduct()
{
	$('#preview .produc t_name').text("");
	$('#preview .product_price').text("");
	$('#preview img').attr('src', '');
	$('#preview .product_description').text("");
	$('#product_quantity').val("");
	$('#product_id').val("").focus();
	$('#preview').hide();
}

function findProduct()
{
	$('#find_product').on('click', function(){
		var product_id = $('#product_id').val();

		$.get('/api/product/'+product_id, 
			function(data)
			{
				if(data) 
				{
					
					$('#preview').show();
					$('#preview .product_name').text(data.name);
					$('#preview .product_price').text("R$ "+data.unit_price);
					$('#preview .product_description').text(data.desc);

					if(data.image)
					{
						$('#preview img').attr('src', '/uploads/images/products/'+data.image);
					}


				}
				else
				{
					clearProduct();
					alert("Produto inexistente");
				}
			}

			);

	});
}

function addProduct()
{
	$('#add-product').on('click', function()
	{
		var product_id = $('#product_id').val();
		var product_quantity = $('#product_quantity').val();
		var postData = {
			product_id: product_id,
			quantity: product_quantity
		};

		$.post('/cart/add', postData, function(data)
			{
				
				clearProduct();
				alert(data);
			}
		);

	}

	)
}


$(function()
{

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	findProduct();
	addProduct();
});