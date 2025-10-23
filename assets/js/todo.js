function getTask()
{

<<<<<<< HEAD
	let task = getSaveTasks()
=======
	// obtiene los registros que están almacenados
	let task = JSON.parse(window.localStorage.getItem("tasks"));
>>>>>>> refs/remotes/origin/main

	let tmp_task = {
			title:document.getElementById("task_name").value, 
			status:false, 
			color:"yellow"
		}

<<<<<<< HEAD
	task.push(tmp_task)
=======
	//añade lo que esté en el input al arreglo
	task.push(document.getElementById("task_name").value)
>>>>>>> refs/remotes/origin/main

	//guarda el arreglo actualizado en formato string
	window.localStorage.setItem("tasks",JSON.stringify(task))
	updateTodoList()

	return false;
}

function updateTodoList()
{
	//primero armo una cadena con los elementos del arreglo
	var lista = "<ol>";

<<<<<<< HEAD
	let tasks = getSaveTasks()

	console.log(tasks)
		

	tasks.forEach((task,i) => {
		 lista+="<li> <input type='checkbox' "+((task.status) ? 'checked' : '')+" onclick='checkTask("+i+")'>   "+task.title+" <button onclick='updateTask("+i+")' >update</button> </li>"
	} );
=======
	let i = 0;
	tasks.forEach((task) =>  { lista+="<li>"+task+" <button onclick='removeItem("+i+")'> eliminar </button> </li>"; i++ } );
>>>>>>> refs/remotes/origin/main

	lista += "</ol>";

	//modifico el DOM 
	document.getElementById("todo_list").innerHTML = lista
}

<<<<<<< HEAD
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
=======
updateTodoList()

function removeItem(target)
{
	let tasks = JSON.parse(window.localStorage.getItem("tasks"));

	tasks.splice(target,1);
	window.localStorage.setItem("tasks",JSON.stringify(tasks))
	updateTodoList()
}
>>>>>>> refs/remotes/origin/main
