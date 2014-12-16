Pizza-factory
=============

The Pizza Factory é um site que permite aos utilizadores deste restaurante encomendar pizzas, e aos seus empregados ver quais as pizzas e encomendas que estão por fazer.   
   
Feito no âmbito da disciplina de Base de Dados, Licenciatura em Design e Multimédia, Universidade de Coimbra, por Mariana Martins e Sofia Rocha.    
Começado em Novembro de 2014.
    
    
GitHub: [https://github.com/sofiafrocha/pizza-factory](https://github.com/sofiafrocha/pizza-factory)


#Manual de Instalação
=============

Requisitos:

 - [MAMP](http://www.mamp.info/en/downloads/) ou equivalente

Passos:

 - Fazer o download do [pizza-factory-master.zip](https://github.com/sofiafrocha/pizza-factory/archive/master.zip)   
 - Descomprimir o ficheiro   
 - Dentro da pasta "1.0" estão duas pastas, "database" e "pizza_factory"   
 - Copiar a pasta "pizza_factory" para a pasta htdocs do MAMP (ou acção equivalente, caso se trate de outro programa)   
 - No phpMyAdmin (que normalmente está [aqui](http://localhost:8888/MAMP/index.php?page=phpmyadmin&language=English)), criar uma base de dados chamada "mydb" (case-sensitive)   
 - Importar o ficheiro "pizza+info.sql" (que está dentro da pasta "database") para a base de dados "mydb"   
 - Abrir o site do pizza_factory, que está no MAMP (normalmente, está [aqui](http://localhost:8888/pizza_factory/))
     

#Manual de Instrucções
=============
O The Pizza factory tem 4 áreas para os utilizadores normais: **Registar**, **Iniciar Sessão**, **Ementa** e **Encomendar**.
   
Para encomendar uma deliciosa pizza, o utilizador tem de se registar, e ter iniciada a sessão.
Existem várias opções de pizzas, na massa, molhos, ingredientes, queijo e tomate. Depois de concluir a encomenda, o utilizador só tem de esperar.   
    
Os empregados do The Pizza Factory (exemplo de um, username:*okenobi* password:*okenobi1*) tem acesso a mais algumas páginas:

 - lista do stock de ingredientes (que também permite repor o stock, adicionando 100 items de cada vez)   
 - lista das encomendas, para ver as encomendas que já foram feitas (e mudar o seu estado, se estão concluídas ou não)   
 - lista de pizzas, para ver as pizzas que já foram encomendadas pelos utilizadores (também se pode mudar o estado das pizzas, de estando a ser feitas, no forno, ou já nas mãos do estafeta para ser entregue)
