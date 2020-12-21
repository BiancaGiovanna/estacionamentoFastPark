const button = document.getElementById('editMainButton');

function registrarPlaca( placaCar ) {
  const url = 'http://http://localhost/bianca/estacionamentoFastPark/backend/api/index.php/enter';
  const options = {
    method: 'POST',
    headers: {
      'Content-Type' : 'application/json'
    }, 
    body: JSON.stringify( placaCar )
  };

  fetch(url, options );
}
function enviarPlacar () {
  const placa = document.getElementById('placa');

  const placaCar = {
    "placa": placa.value
  };
  registrarPlaca(placaCar);

}
button.addEventListener('click', enviarPlacar);
