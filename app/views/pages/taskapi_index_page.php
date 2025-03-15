<h1><?= $title?></h1>
<button type="button" id="create"><?= \app\core\Translate::getText('task_create')?></button>
<table id="tasks">
    <thead>
        <tr>
            <th><?= \app\core\Translate::getText('task_id')?></th>
            <th><?= \app\core\Translate::getText('task_name')?></th>
            <th><?= \app\core\Translate::getText('task_action')?></th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<div id="create-task">
    <form>
        <label for="name"><?= \app\core\Translate::getText('task_name_label')?></label>
        <input type="text" name="name" id="name"/>
        <input type="submit"/>
    </form>
</div>
<script>
    function fillTable(){
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function (){
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    let tasks = JSON.parse(xhr.response);
                    let body = '';
                    for(let task of tasks){
                        body += `<tr><td>${task.id}</td><td>${task.name}</td><td></td></tr>`;
                    }
                    document.querySelector('#tasks tbody').innerHTML = body;
                }else{
                    console.error('Some error with request');
                }
            }
        };
        xhr.open('GET', '/taskapi/all');
        xhr.send();//відправка
    }
    function addTask(){

    }
    fillTable();
    const createBtn = document.getElementById('create');
    const modal = document.getElementById('create-task')
    createBtn.onclick = function (){
        modal.style.display = 'flex';
    };
    document.querySelector('#create-task form').onsubmit = function (e){
        let me = this;
        let data = new FormData(this);
        //let noteName = this.elements.name.value;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function (){
            if(xhr.readyState == 4){
                if(xhr.status == 201){
                    fillTable();
                }else{
                    alert('Did not created');
                    console.error('Some error with request');
                }
                me.reset();
                modal.style.display = 'none';
            }
        };
        xhr.open('POST', '/taskapi/add');
        // xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // xhr.send('name=' + noteName);//відправка
        xhr.send(data);//відправка
        e.preventDefault();
    };
</script>
