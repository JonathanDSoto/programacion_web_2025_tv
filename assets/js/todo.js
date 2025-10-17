function getTask()
{

	// obtiene los registros que están almacenados
	let task = JSON.parse(window.localStorage.getItem("tasks"));

	if(task === null || !Array.isArray(task))
		task = []; 

	//añade lo que esté en el input al arreglo
	task.push(document.getElementById("task_name").value)

	//guarda el arreglo actualizado en formato string
	window.localStorage.setItem("tasks",JSON.stringify(task))
	updateTodoList()

	return false;
}

function updateTodoList()
{
	//primero armo una cadena con los elementos del arreglo
	var lista = "<ol>";
	let tasks = JSON.parse(window.localStorage.getItem("tasks"));

	let i = 0;
	tasks.forEach((task) =>  { lista+="<li>"+task+" <button onclick='removeItem("+i+")'> eliminar </button> </li>"; i++ } );

	lista += "</ol>";

	//modifico el DOM 
	document.getElementById("todo_list").innerHTML = lista
}

updateTodoList()

function removeItem(target)
{
	let tasks = JSON.parse(window.localStorage.getItem("tasks"));

	tasks.splice(target,1);
	window.localStorage.setItem("tasks",JSON.stringify(tasks))
	updateTodoList()
}