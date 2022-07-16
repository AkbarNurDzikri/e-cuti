<div class="container box-login" style="padding-top: 150px;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="row align-items-center">
                <div class="col-md mt-3" data-aos="fade-up" data-aos-duration="1000">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <form action="<?= BASEURL; ?>/auth/credentials" method="POST">
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="username" class="form-label color-primary"><i class="fa-solid fa-user-lock"></i> Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="password" class="form-label color-primary"><i class="fa-solid fa-lock"></i> Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Entry your password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md text-end">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="<?= BASEURL; ?>/assets/vector/access-control.png" alt="vector-login" style="width: 100%;" class="gambar-login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>