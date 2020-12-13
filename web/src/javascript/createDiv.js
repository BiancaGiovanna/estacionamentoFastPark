'use strict';
const listData =[
    {'title':'BLOCO A'},
    {'title':'BLOCO B'},
    {'title':'BLOCO C'},
    {'title':'BLOCO D'}
];

const container = document.querySelector('.cardsContainer');

const createDiv = (title) => {
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
                        XX
                    </span>
                    <span>
                        Clientes
                    </span>
                    </div>
                    <div class="numberClient">
                        <span>
                            XX
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

const mostrarDiv = (block) => {
    container.appendChild ( createDiv(block.title) );
};

listData.forEach ( mostrarDiv );

