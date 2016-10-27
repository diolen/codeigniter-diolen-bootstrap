<?php $this->load->view('common/head', $this->data) ?>

    <div class="container theme-showcase" role="main">
        <div class="page-header">
            <h1><?php echo $page_title ?></h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <?php echo $this->session->flashdata('message') ?>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Email</th>
                            <th><a href="/users/add">Agregar usuario</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td>
                                    <a href="/users/edit/<?php echo $user->id ?>">
                                        <?php echo $user->user_name .' '. $user->user_lastname?>
                                    </a>
                                </td>
                                <td><?php echo $user->user_email ?></td>
                                <td>
                                    <a href="javascript:void(0)" title="Eliminar" data-toggle="modal" data-target="#user_modal" data-user="<?php echo $user->id ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Estas a punto de eliminar un usuario.</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a href="" id="a_user_modal" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('common/footer', $this->data) ?>

<script>
    $('#user_modal').on('shown.bs.modal', function (e) {
        var user_id = $(e.relatedTarget).data('user');
        $('#a_user_modal').attr('href', '/users/delete/'+user_id);
    });
</script>