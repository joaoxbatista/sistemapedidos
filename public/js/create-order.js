function clearProduct()
{
	$('#preview .produc t_name').text("");
	$('#preview .product_price').text("");
	$('#preview img').attr('src', '');
	$('#preview .product_description').text("");
	$('#product_quantity').val("");
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
					$('#result-alert').addClass('alert-danger').text('Nenhum produto corresponde ao código digitado, verifique o mesmo e tente novamente.').show();
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

		console.log(postData);

		$.post('/cart/add', postData, function(data){
			
			clearProduct();
			$('#result-alert').removeClass('alert-danger').addClass('alert-success').text(data).show();
		});

	})
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