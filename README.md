# Desafio Back-End - Campeonato de Futebol da Before

A Before está organizando um campeonato de futebol de salão no final do ano entre os seus funcionários, como serão vários times e em dias diferentes a diretoria solicitou o desenvolvimento de um sistema para controlar o campeonato.

A equipe de análise colheu as informações de como a diretoria espera que o sistema funcione e encaminhou a equipe de desenvolvimento para começar o desenvolvimento da aplicação.

Resumo da análise feita pela _Palmira_, uma das analistas envolvidas no projeto:

> Esta api deverá representar um campeonato de futebol de salão, cada time poderá conter no máximo 5 jogadores em campo incluindo o goleiro, não haverá reservas, juiz como também bandeirinha. 
>
> A equipe de RH poderá cadastrar os jogadores como também distribuir os jogadores nos seus respectivos times, uma vez escalado o jogador não poderá mudar de time mas a equipe de RH poderá ajustar: o nome do jogador, número da sua camiseta e o nome do time se necessário. Não será possível cadastrar um jogador com CPF duplicado.
>
> Os jogos serão registrados após a realização dos mesmo, desta forma não será necessário criar uma tabela com as datas dos jogos, apenas será necessário preencher os dados como: Data da partida, times, cartões e o placar para a classificação final. Um detalhe importante é que poderá ser editado a partida caso tenha alguma informação incorreta.
>
> Caso algum jogador cometa faltas e/ou tenha recebido cartão vermelho, estes valores serão considerados como fator de desempate no final do campeonato, critério de desempate: cada cartão vermelho corresponde a 2 pontos e cada cartão amarelo corresponde a 1 ponto, quem tiver menos pontos ganha.
>
> Por fim, a diretoria gostaria de exibir de forma automática o rank dos times com melhor placar e também um rank dos jogadores para premiação na festa.
>
> Acredito ser um desenvolvimento tranquilo, a diretoria conta com a api o quanto antes para iniciarmos os cadastros!
>
> Bom Trabalho!
Atenciosamente, Palmira.


Neste momento, você está escalado para trabalhar com a equipe de **back-end** e aplicar os seus conhecimentos no desenvolvimento desta api, a equipe de front-end irá cuidar de toda a parte do front para você então não se preocupe!

## Sua API deverá ser capaz de:
1. Cadastrar um jogador;
- Nome
- CPF
- Número da camiseta
2. Cadastrar um time;
- Nome do time
- Jogadores
3. Cadastrar uma partida;
- Horário início
- Horário término
- Placar
4. Listar a classificação dos times no campeonato;

### Itens que podem ser implementados e acrescentam pontos:

- Cadastro de cartões por partida;
- Listar a classificação dos jogadores no campeonato;
- Ordenação das listagem;
- Filtros das listagem;
- Documentação dos endpoints, informando o payload e os possíveis retornos;
- Utilização de containers Docker;
- Implementação de Unit Test;
- Implementação de Testes de Integração;

##  Regras para o desenvolvimento da API:

- A arquitetura deverá respeitar as boas práticas do RestFull;
- A linguagem implementada deverá ser em PHP;
- A api deverá ser implementada usando o framework Laravel;
- Deverá usar um banco de dados relacional para armazenar os dados;
- Estas regras são eliminatórias, o não cumprimento desclassifica o candidato.

## Como sua prova será avaliada:

- Capacidade de adicionar jogadores, times, partidas e listar o rank do campeonato como também listar o rank dos jogadores;
- Tratamento de erros;
- Implementação de padrões de projeto (design patterns, SOLID, etc); 
- Documentação dos endpoints;
- Código limpo e organizado;
- Modelagem do banco de dados;

## Duração da prova

A prova poderá ser entregue até:

**11/10/2020 às 23:59:59**

## Como entregar a prova

Antes de começar o desenvolvimento, faça um fork do repositório do avaliador e, após terminar faça um clone do repositório forkeado no seu ambiente de desenvolvimento.

Após terminar o desenvolvimento, submeta sua prova ao repositório forkeado e, após terminar, abra uma Pull Request solicitando a inclusão do seu código ao repositório do avaliador.
Resumindo:

1. Fork
2. Clone
3. Desenvolvimento
4. Push para o Fork
5. Pull Request do Fork para o repositório do seu Avaliador

Seguindo estes passos não tem como errar, mas caso algo aconteça contacte o seu avaliador!

Boa sorte! Aguardamos pela sua prova :smile:.
