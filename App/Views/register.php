<div class="login-box">
    <div class="login-logo">
        <h1>TRELLO</h1>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Registration</p>

            <form action="/register" method="POST">
                <div class="input-group mb-3">
                    <input type="name" name="name" class="form-control" placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4">
                        <button type="submit" name="ok" class="btn btn-warning btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-4 offset-4">
                    <a href="/login" style="font-size: 20px;">Go to login</a>
                </div>
            </div>
        </div>
    </div>
</div>