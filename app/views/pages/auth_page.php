<form action="<?= $action?>" method="post">
    <label for="login">Login</label>
    <div class="input-wrapper">
        <input type="text" name="login" id="login"/>
        <div class="title">Enter your login name</div>
    </div>
    <label for="pass">Password</label>
    <div class="input-wrapper">
        <input type="password" name="password" id="pass"/>
        <div class="title">Enter your password</div>
    </div>
    <input type="submit"/>
</form>