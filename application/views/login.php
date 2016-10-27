<?php $this->load->view('common/head', $this->data) ?>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1><?php echo $page_title ?></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="user_email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="user_email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_pass" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="user_pass" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('common/footer', $this->data) ?>