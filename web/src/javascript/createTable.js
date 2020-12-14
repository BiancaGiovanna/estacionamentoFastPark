const listTable =[
    {'placa':'AAAAA'},
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
                <td class="tableLineStyle">A</td>
                <td class="tableLineStyle"></td>
                <td class="tableLineStyle">1</td>
            </tr>
        </table>
        `;
    return newTR;
}

const showTR = (tr) => {
    table.appendChild (createTable(tr.placa));
};

listTable.forEach (showTR);