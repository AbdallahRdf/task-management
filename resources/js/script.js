const baseURL = "http://localhost/task-management/api/data.php";

let currentInput = null;
let currentBtn = null;
let currentInputValue = null;

// handles when clicked anywhere else other that the input, to make it disabled
document.addEventListener("click", (e) => {
    if (
        currentBtn !== null && 
        currentInput !== null &&
        e.target !== currentInput 
        && e.target !== currentBtn
    )
    {
        if (currentBtn.textContent === "Save"){
            currentBtn.textContent = "Update";
        }
        if(!currentInput.disabled){
            currentInput.disabled = true;
            currentInput.value = currentInputValue;
        }
    }
})

// fetches data 
const fetchData = async (URL) => {
    try {
        const data = await fetch(URL);
        const formattedData = await data.json();
        return formattedData;
    } catch (error) {
        console.error(`Error while fetching data: ${error}`);
    }
}

const sendData = async (checked, id) => {
    const postData = { checked: Number(checked), id };

    const fetchOptions = {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(postData),
    }

    try {
        fetch(baseURL, fetchOptions);
    } catch (error) {
        console.error('Error:', error);
    }
}

// handles when a checkbox is checked
const handleChecked = (e) => {
    const hiddenInput = e.target.parentNode.firstChild;
    const nameInput = e.target.parentNode[2];
    const checkBox = e.target;
    if (checkBox.checked) {
        nameInput.classList.add("text-secondary");
        nameInput.classList.remove("text-dark");
    }
    else {
        nameInput.classList.add("text-dark");
        nameInput.classList.remove("text-secondary");
    }
    sendData(checkBox.checked, hiddenInput.value);
}

const handleUpdateFormSubmit = (e) => {

    const updateBtn = e.target.lastChild; // get the button
    const input = e.target.children[2]; // get the input

    if (updateBtn.textContent === "Update")
    {
        e.preventDefault();
        updateBtn.textContent =  "Save";
        input.disabled = false;

        currentInput = input;
        currentBtn = updateBtn;
        currentInputValue = input.value;
    }
    else
    {
        if(!/[a-zA-Z0-9]+(\s*([a-zA-Z0-9])*)*$/.test(input.value)) // validate the task name
        {
            e.preventDefault();
        }
    }
}

// creates html elements to show data;
/*
    <div>
        <form method="post" action="taskController.php">
            <input type="hidden" value="id">
            <input type="checkbox">
            <input type="text">
            <button>Update</button>
        </form>
        <form method="post" action="taskController.php">
            <input type="hidden" value="id">
            <button>Delete</button>
        </form>
    </div>
*/
const createDataRow = (data) => {
    // create the row that will hold the data;
    const rowDiv = document.createElement("div");
    rowDiv.classList.add("d-flex", "align-items-center", "mb-3", "border-bottom", "pb-1");

    // create the update form;
    const updateForm = document.createElement("form");
    updateForm.method = "post";
    updateForm.action = "../../controllers/taskController.php";
    updateForm.classList.add("d-flex", "w-100", "me-1");
    updateForm.addEventListener("submit", e => handleUpdateFormSubmit(e));
    updateForm.style.display = "inline";

    // create the hidden input
    const hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = "task-id";
    hiddenInput.value = data["id"];

    // create a hidden input for the delete form
    const hInput = document.createElement("input");
    hInput.type = "hidden";
    hInput.name = "task-id";
    hInput.value = data["id"];

    // create the task name input;
    const input = document.createElement("input");
    input.type = "text";
    input.classList.add("form-control", "bg-transparent", "border-0");
    input.name = "task-name";
    input.disabled = true;
    input.value = data["name"];

    // create the checkbox;
    const checkBox = document.createElement("input");
    checkBox.type = "checkbox";
    checkBox.classList.add("form-check-input", "align-self-center", "me-1");
    checkBox.name = "finished";
    checkBox.checked = data["isFinished"];
    input.classList.add(checkBox.checked ? "text-secondary" : "text-dark");
    checkBox.addEventListener("change", e => handleChecked(e));

    // create the update button;
    const updateBtn = document.createElement("button");
    updateBtn.classList.add("update-btn", "btn", "btn-outline-success");
    updateBtn.textContent = "Update";

    // create the update form;
    const deleteForm = document.createElement("form");
    deleteForm.method = "post";
    deleteForm.action = "../../controllers/taskController.php";
    deleteForm.classList.add("d-flex");
    // deleteForm.addEventListener("submit", e => handleDeleteFormSubmit(e));
    deleteForm.style.display = "inline";

    // create the delete button;
    const deleteBtn = document.createElement("button");
    deleteBtn.classList.add("delete-btn", "btn", "btn-outline-danger");
    deleteBtn.textContent = "Delete";

    
    updateForm.appendChild(hiddenInput);
    updateForm.appendChild(checkBox);
    updateForm.appendChild(input);
    updateForm.appendChild(updateBtn);

    deleteForm.appendChild(hInput);
    deleteForm.appendChild(deleteBtn);

    rowDiv.appendChild(updateForm);
    rowDiv.appendChild(deleteForm);

    return rowDiv;
}

// render the data;
const renderData = async () => {
    const data = await fetchData(baseURL);

    const tasksTable = document.getElementById("tasks-table");
    tasksTable.innerHTML = "";

    if(data.length <= 0)
    {
        const div = document.createElement("div");
        div.textContent = "NO Tasks To Show!";
        tasksTable.appendChild(div);
    }
    else
    {
        for(let i = 0; i < data.length; i++)
        {
            tasksTable.appendChild(createDataRow(data[i]));
        }
    }
}

renderData();