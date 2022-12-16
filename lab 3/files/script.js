let isTable = false;
let table;
let size_row = 1;


function create_table(){
    if (isTable == false){
        
        isTable = true;

        let addbtn = document.getElementById("add_row");
        addbtn.disabled = false;

        let deletebtn = document.getElementById('delete_row');
        deletebtn.disabled = false;

        let inputfield = document.getElementById('input_field');
        inputfield.disabled = false;

        table = document.createElement('table');
        // let thead = document.createElement('thead');
        // let tbody = document.createElement('tbody');

        // table.appendChild(thead);
        // table.appendChild(tbody);
        

        let row_1 = document.createElement('tr');
        let heading_1 = document.createElement('th');
        heading_1.innerHTML = "№";

        let heading_2 = document.createElement('th');
        heading_2.innerHTML = "Name";

        let heading_3 = document.createElement('th');
        heading_3.innerHTML = "Surname";

        let heading_4 = document.createElement('th');
        heading_4.innerHTML = "Age";

        row_1.appendChild(heading_1);
        row_1.appendChild(heading_2);
        row_1.appendChild(heading_3);
        row_1.appendChild(heading_4);
        table.appendChild(row_1);

        table.classList.add("table");
        row_1.classList.add("header_row");

        document.getElementById('table').appendChild(table);
    }
    else{
        alert("Ошибка, таблица уже создана");
    }
}

function add_new_row(){
    let row = document.createElement('tr');
    let cell_1 = document.createElement('th');
    cell_1.innerHTML = size_row;

    let cell_2 = document.createElement('th');
    let cell_3 = document.createElement('th');
    let cell_4 = document.createElement('th');

    let input_cell2 = document.createElement('input', type='text');
    let input_cell3 = document.createElement('input', type='text');
    let input_cell4 = document.createElement('input', type='text');

    input_cell2.classList.add('cell_input');
    input_cell3.classList.add('cell_input');
    input_cell4.classList.add('cell_input');

    cell_2.appendChild(input_cell2);
    cell_3.appendChild(input_cell3);
    cell_4.appendChild(input_cell4);


    row.appendChild(cell_1);
    row.appendChild(cell_2);
    row.appendChild(cell_3);
    row.appendChild(cell_4);

    table.appendChild(row);
    
    size_row = size_row + 1;
}

function delete_row(){
    let find_row = document.getElementById('input_field').value;

    if (isNaN(parseInt(find_row))){
        alert('Введите число');
    }
    else{
        let rows = document.querySelectorAll(`table tr`);
        for (let row of rows){
            let num_row = row.querySelector('th').innerHTML;
            if (num_row == find_row && find_row != '№'){     
                table.removeChild(row);
                return;
            }
        }
        alert('Такой строки нет');
    }
}

