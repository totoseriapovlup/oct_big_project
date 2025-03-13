<?php include '../app/views/common/errors.php';?>
<form action="<?= $action ?>" method="post">
    <label for="login"><?= \app\core\Translate::getText('auth_login_label')?></label>
    <input type="text" name="login" id="login"/>
    <label for="pass"><?= \app\core\Translate::getText('auth_pass_label')?></label>
    <input type="password" name="password" id="pass"/>
    <input type="submit"/>
</form>