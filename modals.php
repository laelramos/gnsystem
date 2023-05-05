<?php
require_once('conexao.php');
?>


<!-- Novo Produto -->
<div class="modal fade" id="new-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulário para inserir um novo produto -->
        <form id="formNovoProduto" action="criar_produto.php" method="POST">
          <div class="form-group">
            <label for="descricaoProduto">Descrição</label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricao" required>
          </div>
          <div class="form-group">
            <label for="eanProduto">Código EAN</label>
            <input type="text" class="form-control" id="eanProduto" name="ean" required>
          </div>
          <div class="form-group">
            <label for="categoriaProduto">Categoria</label>
            <input type="text" class="form-control" id="categoriaProduto" name="categoria" required>
          </div>
          <div class="form-group">
            <label for="fabricanteProduto">Fabricante</label>
            <input type="text" class="form-control" id="fabricanteProduto" name="fabricante" required>
          </div>
          <div class="form-group">
            <label for="franquiaProduto">Franquia</label>
            <input type="text" class="form-control" id="franquiaProduto" name="franquia" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" form="formNovoProduto">Adicionar</button>
      </div>
    </div>
  </div>
</div>


<!-- Edição de dados -->
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-editar-titulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-editar-titulo">Editar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="modal-id">ID</label>
            <input type="number" class="form-control" id="modal-id" readonly>
          </div>
          <div class="form-group">
            <label for="modal-descricao">Descrição</label>
            <input type="text" class="form-control" id="modal-descricao">
          </div>
          <div class="form-group">
            <label for="modal-categoria">Categoria</label>
            <select class="form-control" id="modal-categoria">
    <!-- As opções serão preenchidas dinamicamente pelo JavaScript -->
</select>
          </div>
          <div class="form-group">
            <label for="modal-fabricante">Fabricante</label>
            <input type="text" class="form-control" id="modal-fabricante">
          </div>
          <div class="form-group">
            <label for="modal-franquia">Franquia</label>
            <input type="text" class="form-control" id="modal-franquia" step="0.01">
          </div>
          <div class="form-group">
            <label for="modal-ean">EAN</label>
            <input type="number" class="form-control" id="modal-ean">
          </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success" onclick="salvarProduto()">Salvar</button>
      </div>
    </div>
  </div>
</div>



<!-- Adiciona produto ao carrinho -->
<div class="modal fade" id="add-cart-modal" tabindex="-1" role="dialog" aria-labelledby="product-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product-modal-label">Detalhes do Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="product-description">Descrição:</label>
                        <input type="text" class="form-control" id="product-description" name="product-description">
                    </div>
                    <div class="form-group">
                        <label for="product-quantity">Quantidade:</label>
                        <input type="number" class="form-control" id="product-quantity" name="product-quantity" value="1">
                    </div>
                    <div class="form-group">
                        <label for="product-value">Valor Unitário:</label>
                        <input type="text" class="form-control" id="product-value" name="product-value" placeholder="R$0,00">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="add-to-cart">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<!-- Nenhum produto encontrado -->
<div class="modal fade" id="no-product-found-modal" tabindex="-1" role="dialog" aria-labelledby="noProductFoundLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="noProductFoundLabel">Nenhum produto encontrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nenhum produto encontrado com este nome. Deseja cadastrar este produto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary" id="add-new-product">Sim</button>
      </div>
    </div>
  </div>
</div>



