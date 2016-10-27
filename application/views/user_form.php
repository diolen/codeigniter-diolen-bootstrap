<?php $this->load->view('common/head', $this->data) ?>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1><?php echo $page_title ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            
            <?php echo form_open('users/'.$action, ['class'=>'form-horizontal'], $hidden) ?>
            
                <div class="form-group">
                    <label for="user_name" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <?php echo form_input([
                            'name' => 'user_name',
                            'id' => 'user_name',
                            'value' => isset($user->user_name) ? $user->user_name : set_value('user_name'),
                            'class' => 'form-control',
                            'placeholder' => 'Nombre'                         
                        ]) ?>
                        <?php echo form_error('user_name'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="user_lastname" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-10">
                        <?php echo form_input([
                            'name' => 'user_lastname',
                            'id' => 'user_lastname',
                            'value' => isset($user->user_lastname) ? $user->user_lastname : set_value('user_lastname'),
                            'class' => 'form-control',
                            'placeholder' => 'Apellido'                         
                        ]) ?> 
                        <?php echo form_error('user_lastname'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="user_email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <?php $email_value = isset($user->user_email) ? $user->user_email : set_value('user_email') ?>
                        <input type="text" name="user_email" id="user_email" value="<?php echo $email_value ?>" class="form-control" placeholder="Email" <?php echo $readonly ?>>
                        <?php echo form_error('user_email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_pass" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                        <?php echo form_password([
                            'name' => 'user_pass',
                            'id' => 'user_pass',
                            'value' => set_value('user_pass'),
                            'class' => 'form-control',
                            'placeholder' => 'Contraseña'                         
                        ]) ?>
                        <?php echo form_error('user_pass'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="user_confirmpass" class="col-sm-2 control-label">Confirmar</label>
                    <div class="col-sm-10">
                        <?php echo form_password([
                            'name' => 'user_confirmpass',
                            'id' => 'user_confirmpass',
                            'value' => set_value('user_confirmpass'),
                            'class' => 'form-control',
                            'placeholder' => 'Confirmar la contraseña'                         
                        ]) ?>
                        <?php echo form_error('user_confirmpass'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/users" class="btn btn-default">Cancelar</a>
                        <?php echo form_submit([
                            'name' => 'user_submit',
                            'value' => 'Guardar',
                            'class' => 'btn btn-primary'                         
                        ]) ?>                        
                    </div>
                </div>
                
            <?php echo form_close() ?>
            
        </div>
    </div>
</div>

<?php $this->load->view('common/footer', $this->data) ?>