const listTable =[
    {'placa':'Lucas'},
    {'placa':'AAAAA'}
];

const table = document.querySelector('.tableConsut');

const createTable = (placa) => {
    const newTR = document.createElement('tr');
    newTR.classList.add ('tableLine');
    newTR.innerHTML = `
        <table class="tableConsut">
            <tr class="tableLine">
                <td class="tableLineStyle">${placa}</td>
                <td class="tableLineStyle">
                <button class="comprovante">
                    <img src="../src/image/icons/receipt.svg" alt="Comprovante">
                </button>
                </td>
                <td class="tableLineStyle"></td>
                <td class="tableLineStyle"></td>
            </tr>
        </table>

        
        `;
    return newTR;
}

const showTR = (tr) => {
    table.appendChild (createTable(tr.placa));
};

listTable.forEach (showTR);


/*modal para mostrar o comprovante*/ 
const modal = document.getElementById('myModal');
const btn = document.querySelectorAll(".comprovante");
const span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

 btn.forEach((btn) => {btn.addEventListener("click", (event) => { modal.style.display = "block";});});
