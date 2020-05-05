<div class="container">
    <h2 class="text-center mt-2">AUTHORIZATION</h2>

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 border border-dark mx-auto m-2 p-3 rounded">
            <form method="post" action="/user/login">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Type your Login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Type your Password">
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
    </div>
</div>