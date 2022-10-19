<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
                <h3><?php echo $produto['designacao']; ?></h3>
                <hr>

                <form action="<?php echo site_url('gestao/editarguardar' . $produto['id_produto']); ?>">
                    <div class="form-group">
                        <label>Designacao:</label>
                        <input type="text" name="text_designacao" class="form-control" placeholder="Nome do Produto" value="<?php echo $produto['designacao']; ?>" required>
                    </div>

                    <?php if (isset($mensagem)) : ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $mensagem; ?>

                        </div>
                    <?php endif; ?>

                </form>
            </div>
            <a href="<?php echo site_url('gestao/novo') ?>" class="btn btn-primary">Novo Produto</a>
            <a href="<?php echo site_url('gestao/movimentos') ?>" class="btn btn-primary">Movimentos</a>
        </div>

        <div class="col-sm-4 col-12 text-right">
            <a href="<?php echo site_url('geral/logout') ?>" class="btn btn-primary">Sair</a>
        </div>
    </div>

    <hr>

    <div class="mt-3 mb-3">

        <?php if (count($produtos) == 0) : ?>
            <p class="text-center text-danger">Não existem produtos registrados.</p>
        <?php else : ?>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <th class='text-left'>Produto</th>
                    <th class='text-center'>Quantidade</th>
                    <th></th>
                </thead>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td class="text-left">
                            <a href="<?php echo site_url('gestao/editar/' . $produto['id_produto']) ?>" class="mr-3"><i class="fa fa-pencil"></i></a>
                            <?php echo $produto['designacao'] ?>
                        </td>

                        <td class="text-center">
                            <?php echo $produto['quantidade'] ?>

                        </td>

                        <td class="text-right">
                            <a href="<?php echo site_url('gestao/adicionar/' . $produto['id_produto']) ?>" class="mr-3"><i class="fa fa-plus-square"></i></a>
                            <a href="<?php echo site_url('gestao/subtrair/' . $produto['id_produto']) ?>" class="mr-3"><i class="fa fa-minus-square"></i></a>
                            <a href="<?php echo site_url('gestao/eliminar/' . $produto['id_produto']) ?>" class="mr-3"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>

                <?php endforeach; ?>
            </table>

            <hr>
            <p>Total de Produtos: <b><?php echo count($produtos); ?></b></p>
        <?php endif; ?>
    </div>
</div>