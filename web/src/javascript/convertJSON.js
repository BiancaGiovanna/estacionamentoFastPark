const botaoCadastrar = document.getElementById("btnCadastrar")
const form = document.getElementById("formularioCadastrar")
const testPostJson = {
  "placa": "ZZZ-9999"
}

botaoCadastrar.addEventListener("click", (event) => {
  let valorInput = document.getElementById("inputCadastrar").value
  const xhr = new XMLHttpRequest();
  xhr.open("POST", `http://localhost/bianca/estacionamentoFastPark/backend/api/index.php/enter/${valorInput}`, true);
  xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
  xhr.send();
  

})

