<?= $this->extend('layout/template_login'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg" style="margin-top: 25%">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row ">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-success mb-4">Login Page</h1>
                                </div>
                                <?php //$this->session->flashdata('message'); 
                                ?>
                                <!-- <form class="user" id="login"> -->
                                <form class="user" action="#" id="form-login">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="button" id="login" class="btn btn-success btn-user btn-block">
                                                Login
                                            </button>
                                            <?php
                                            ?>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?= base_url(); ?>">Home</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>