function getTask()
{

	let task = JSON.parse(window.localStorage.getItem("tasks"));

	if(task === null || !Array.isArray(task))
		task = []; 

	task.push(document.getElementById("task_name").value)

	window.localStorage.setItem("tasks",JSON.stringify(task))
	updateTodoList()

	return false;
}

function updateTodoList()
{
	var lista = "<ol>";
	let tasks = JSON.parse(window.localStorage.getItem("tasks"));

	tasks.forEach((task) =>  lista+="<li>"+task+"</li>" );

	lista += "</ol>";

	document.getElementById("todo_list").innerHTML = lista
}

updateTodoList()