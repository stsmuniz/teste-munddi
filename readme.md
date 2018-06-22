TESTE MUNDDI
============

O objetivo principal é fechar o ciclo de programação desde a infra até o frontend publicado. Separei em cada área a explicação necessária, além de adicionar um "extra" em cada uma, que contará pontos extras caso entregue (mas não é requerido).

Segue abaixo o briefing do desafio:

----------------------------------------------------------------------------------------------------------------------------------------------------

## Descrição
Um de nossos principais ambientes que são acessados são os mapas de publicação de pontos de venda (Exemplos: Bio2, Snackout, Latinex, etc). Milhões de usuários acessam mensalmente esses mapas para encontrar os produtos que procuram mais próximos fisicamente a eles. 
O desafio é fazer um mapa desse 100% responsivo, leve e que detecte automaticamente a localização do usuário ao acessá-lo e que exiba as informações de cada loja ao clicar em seu pin. Para isso, você vai mostrar suas habilidades em cada categoria abaixo:

## Infraestrutura

Já temos um servidor online no IP 18.228.4.176. Ele é uma máquina isolada na AWS com instalação base do Ubuntu 16 e está inteiramente disponível para você. Para acessá-la via SSH, utilize a chave privada em anexo com o usuário ubuntu. Instale e configure apache, mysql e php isoladamente nesta máquina. Ela deve ser acessível publicamente para exibição de seu teste.
Faça essa parte de infraestrutura por último. A programação é a que mais vale pontos neste desafio!

** Extra: instalar certificado SSL usando Let's Encrypt.

## Banco de dados

Utilizando MySQL, crie uma tabela para armazenar as lojas. Esta tabela deve armazenar os seguintes campos: nome da loja, endereço completo e coordenadas (latitude + longitude). Segue em anexo uma listagem com 250 lojas do nosso bairro (Vila Leopoldina).

** Extra: Utilizar armazenamento com datatype POINT do MySQL.

## Backend

Criar um serviço RESTful de consulta de lojas, que pode ser um PHP simples parametrizado mas necessariamente OO. Ele deve responder com um JSON array de lojas baseado nos parâmetros de entrada que são as pontas da área visível do mapa, ou seja, não devemos retornar lojas que não serão exibidas na área visível.

** Extra: utilizar framework Laravel para padronizar a resposta do serviço criado.

## Frontend

Deverá ser 100% responsivo com uso de Bootstrap. Utilizar javascript com JQuery. Detectar localização inicial do usuário via HTML5. Plotar os pins no mapa e exibir informações em infowindow vindas do serviço.

** Extra1: criar link para navegação a partir da localização do usuário até a loja para ser aberto no google maps.
** Extra2: criar um espaço mais interessante para exibir as informações da loja, que não dependa de uma infowindow.
