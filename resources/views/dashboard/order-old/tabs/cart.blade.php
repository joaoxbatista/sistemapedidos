@if(count($cart->getItems()) > 0)

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Carrinho de Compras</h4>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endif

