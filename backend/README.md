#API estacionamento FastParking

diretorio para acessar a API:

**********************************************************************
*                                                                    *
*       localhost/X/estacionamentoFastPark/backend/api/index.php     *
*                                                                    *
**********************************************************************

"X" = o nome da pasta que esta armazenando a pasta estacionamentoFastPark
    'Ex': 'localhost/lucas/estacionamentoFastPark/..'


    \\ Acesso ao Retorno de Dados via Get //
# Entrada
    '" ../backend/api/index.php/enter "';
"End-Point que vai retornar todos os Dados da Entrada do Sistema"

# Saida
    '" ../backend/api/index.php/exit "';
"End-Point que vai retornar todos os dados da Saida do Sistema"

# Preço
    '" ../backend/api/index.php/price "';
"End-Point que vai retornar todos os Precos que estão Salvos no banco"

# vagas
    '" ../backend/api/index.php/wave "';
"End-Point para retornar todos os carros que estao ativos no estacionamento"

# Relatorio
    '" ../backend/api/index.php/report "';
"End-Point que retorna todos os dados "


    \\ Acesso ao Envio de Dados via Post //
# Entrada
    '" ../backend/api/index.php/enter "';
"Entrada de dados para o Banco de dados(o unico atributo para ser enviado é a placa do carro)"


    \\ Acesso para a Atualizção de Dados via Put //
# Preco
    '" ../backend/api/index.php/price/{id}/{valor} "';
"Atualiza o valor do preco da primeira hora e a que acrescenta quando passa da primeira hora (so existem dois  valores para se alterar onde o id=1, é o da primeira hora; id=2 é o das horas complementares da primeira hora)"

# Saida
    '" ../backend/api/index.php/exit{codigo} "';
"É nescessario que obtenha o codigo do comprovante para atualizar a saida do carro do estacionamento e o preco que ele irá pagar(O codigo do comprovante é formado por "Segundos-Horas-dias-ano-minuto-mes
05-16-05-20-50-12")"
