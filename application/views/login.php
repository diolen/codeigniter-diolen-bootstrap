<?php $this->load->view('common/head', $this->data) ?>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1><?php echo $page_title ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->session->flashdata('message') ?>
            <?php echo form_open('auth/login', ['class'=>'form-horizontal']) ?>
                <div class="form-group">
                    <label for="user_email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <?php echo form_input([
                            'name' => 'user_email',
                            'id' => 'user_email',
                            'value' => set_value('user_email'),
                            'class' => 'form-control',
                            'placeholder' => 'Email'                         
                        ]) ?>
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
                            'placeholder' => 'Max 12 characteres'                         
                        ]) ?>
                        <?php echo form_error('user_pass'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Enviar</button>
                        <a href="/users/add">Registrarse</a>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<?php $this->load->view('common/footer', $this->data) ?>