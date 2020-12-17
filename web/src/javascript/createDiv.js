'use strict';
const listVaucher =[
    {'title':'VAGAS', 'numberClient':300, 'numberVachuers':0},
    {'title':'VAGAS', 'numberClient':300, 'numberVachuers':0},
    {'title':'VAGAS', 'numberClient':300, 'numberVachuers':0},
    {'title':'VAGAS', 'numberClient':300, 'numberVachuers':0}
];

const container = document.querySelector('.cardsContainer');

const createDiv = (title, numberClient, numberVachuers) => {
    const newDiv = document.createElement('div');
    newDiv.classList.add ('card');
    newDiv.innerHTML = `
                <div class="cardControlWave" id="cardControlWave">
                <h2 class="titleBlock">${title}</h2>
                <div class="imageCard">
                    <img src="../src/image/icons/parkin_icon.svg" alt="">
                </div>
                <div class="informationBox">
                    <div class="numberClient">
                    <span>
                        ${numberClient}
                    </span>
                    <span>
                        Clientes
                    </span>
                    </div>
                    <div class="numberClient">
                        <span>
                            ${numberVachuers}
                        </span>
                        <span>
                            Vagas
                        </span>
                    </div>
                </div>
            </div>
        `;
    return newDiv;
}

const showDiv = (block) => {
    container.appendChild (createDiv(block.title, block.numberClient, block.numberVachuers));
};

listVaucher.forEach (showDiv);




