<?php include '../app/views/common/errors.php';?>
<form action="<?= $action ?>" method="post">
    <label for="name"><?= \app\core\Translate::getText('task_name_label')?></label>
    <input type="text" name="name" id="name"/>
    <input type="submit"/>
</form>