function getTask()
{

	let task = getSaveTasks()

	let tmp_task = {
			title:document.getElementById("task_name").value, 
			status:false, 
			color:"yellow"
		}

	task.push(tmp_task)

	window.localStorage.setItem("tasks",JSON.stringify(task))
	updateTodoList()

	return false;
}

function updateTodoList()
{
	var lista = "<ol>";

	let tasks = getSaveTasks()

	console.log(tasks)
		

	tasks.forEach((task,i) => {
		 lista+="<li> <input type='checkbox' "+((task.status) ? 'checked' : '')+" onclick='checkTask("+i+")'>   "+task.title+" <button onclick='updateTask("+i+")' >update</button> </li>"
	} );

	lista += "</ol>";

	document.getElementById("todo_list").innerHTML = lista
}

function checkTask(target)
{
	console.log(target)

	let tasks = getSaveTasks()

	tasks.forEach((task,i) => {
		if(target == i){
			task.status = (!task.status)
		}
	} );

	window.localStorage.setItem("tasks",JSON.stringify(tasks))

	updateTodoList();
}

function updateTask(target)
{
	console.log(target)

	let tasks = getSaveTasks()

	tasks.forEach((task,i) => {
		if(target == i){
			
			document.getElementById('update_form').style="display:block"
			document.getElementById('task_update_name').value=task.title

			const element = document.getElementById('task_update_name');
    		element.setAttribute('data-position', i);

		}
	} );

	
}

function saveTask(){

	let tasks = getSaveTasks()

	const element = document.getElementById('task_update_name');
    let target = element.getAttribute('data-position');

	tasks.forEach((task,i) => {
		if(target == i){
			task.title = document.getElementById('task_update_name').value
		}
	} );

	window.localStorage.setItem("tasks",JSON.stringify(tasks))

	updateTodoList();

	document.getElementById('update_form').style="display:none"

	return false;

}

function getSaveTasks(){
	
	let tasks = [];
	try{
		tasks = JSON.parse(window.localStorage.getItem("tasks"));

		if(tasks === null || !Array.isArray(tasks))
			tasks = []; 
	}catch{

	}

	return tasks;

}

updateTodoList()