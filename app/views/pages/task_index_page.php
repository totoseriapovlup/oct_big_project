<h1><?= $title?></h1>
<a href="<?= \app\core\Route::url('task','create')?>"><?= \app\core\Translate::getText('task_create')?></a>
<table>
    <thead>
        <tr>
            <th><?= \app\core\Translate::getText('task_id')?></th>
            <th><?= \app\core\Translate::getText('task_name')?></th>
            <th><?= \app\core\Translate::getText('task_action')?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task):?>
            <tr>
                <td><?= $task['id']?></td>
                <td><?= $task['name']?></td>
                <td></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>