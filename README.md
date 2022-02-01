# Campeonato de futebol de salão

API para organizar os jogos de futebol de salão de uma empresa.

## Ações da API:

1) Cadastro de jogadores:
- Nome completo
- CPF
- Número da camiseta

2) Cadastro de times:
- Nome
- Jogadores (5 no máximo)

3) Cadastro de partida:
- Horário de início
- Horário de término
- Placar final

4) Ranking de classificação


## Endpoints

Jogos:
```
[GET]       /api/games
[POST]      /api/games
[GET]       /api/games/{game}
[PUT|PATCH] /api/games/{game}
```

Cartões em jogos:
```
[POST]      /api/games/{game}/cards
[GET]       /api/games/{game}/cards
[PUT|PATCH] /api/games/{game}/cards/{card}
```

Jogadores:
```
[GET]       /api/payers
[POST]      /api/payers
[GET]       /api/payers/{payer}
[PUT|PATCH] /api/payers/{payer}
```

Times:
```
[GET]       /api/teams
[POST]      /api/teams
[GET]       /api/teams/{team}
[PUT|PATCH] /api/teams/{team}
```

Jogadores dos times:
```
[GET]       /api/teams/players
[PUT|PATCH] /api/teams/{team}/players/{player}
```

Ranking:
```
[GET]       /api/rankings
```
