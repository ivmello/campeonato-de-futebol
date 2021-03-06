<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}

            body {
                /* background: red; */
                padding: 0;
            }

            footer {
                background: #e9e9e9;
                margin-top: 50px;
                padding: 50px ;
                text-align: center;
            }
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
            ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            table {
                padding: 20px !important;
            }
        </style>
    </head>
    <body class="antialiased">

        <br/>
        <div class="container">
            <h2>Documenta????o da API</h2>
            <br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>M??todo</th>
                        <th>URI</th>
                        <th>Payload</th>
                        <th>Query Params</th>
                        <th>Descri????o</th>
                    </tr>
                </thead>

                <tbody>
                    <tr colspan="5">
                        <td><h4><b>Games</b></h4></td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/games</td>
                        <td></td>
                        <td>
                            <code>
                            <ul>
                                <li>"order_field": string</li>
                                <li>"order_direction": string</li>
                                <li>"limit": number</li>
                            </ul>
                            </code>
                        </td>
                        <td>Lista todos os jogos</td>
                    </tr>
                    <tr>
                        <td>POST</td>
                        <td>api/games</td>
                        <td>
                            <code>
                                <ul>
                                    <li>"start_date": datetime</li>
                                    <li>"end_date": datetime</li>
                                    <li>"team_a_id": number</li>
                                    <li>"team_b_id": number</li>
                                    <li>"score_team_a": number</li>
                                    <li>"score_team_b": number</li>
                                </ul>
                            </code>
                        </td>
                        <td>

                        </td>
                        <td>Cria um jogo</td>
                    </tr>

                    <tr>
                        <td>PUT</td>
                        <td>api/games/{game}</td>
                        <td>
                            <code>
                                <ul>
                                    <li>"start_date": datetime</li>
                                    <li>"end_date": datetime</li>
                                    <li>"team_a_id": number</li>
                                    <li>"team_b_id": number</li>
                                    <li>"score_team_a": number</li>
                                    <li>"score_team_b": number</li>
                                </ul>
                            </code>
                        </td>
                        <td>

                        </td>
                        <td>Atualiza um jogo</td>
                    </tr>

                    <tr>
                        <td>GET</td>
                        <td>api/games/{game}</td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>Mostra um jogo</td>
                    </tr>

                    <tr>
                        <td>POST</td>
                        <td>api/games/{game}/cards</td>
                        <td>
                            <code>
                                <ul>
                                    <li>"player_id": number</li>
                                    <li>"red_card": number</li>
                                    <li>"yellow_card": number</li>
                                </ul>
                            </code>
                        </td>
                        <td>

                        </td>
                        <td>Adiciona um cart??o a um jogo</td>
                    </tr>

                    <tr>
                        <td>GET</td>
                        <td>api/games/{game}/cards</td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>Mostra a lista de cart??es associados a um jogo</td>
                    </tr>

                    <tr>
                        <td>PUT</td>
                        <td>api/games/{game}/cards/{card}</td>
                        <td>
                            <code>
                                <ul>
                                    <li>"player_id": number</li>
                                    <li>"red_card": number</li>
                                    <li>"yellow_card": number</li>
                                </ul>
                            </code>
                        </td>
                        <td>

                        </td>
                        <td>Atualiza um cart??o</td>
                    </tr>
                </tbody>


                <tbody>
                    <tr colspan="5">
                        <td><h4><b>Jogadores</b></h4></td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/players</td>
                        <td>

                        </td>
                        <td>
                        <code>
                        <ul>
                            <li>"order_field": string</li>
                            <li>"order_direction": string</li>
                            <li>"limit": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>Lista todos os jogadores</td>
                    </tr>

                    <tr>
                        <td>POST</td>
                        <td>api/players</td>
                        <td>
                        <code>
                        <ul>
                            <li>"name": string</li>
                            <li>"cpf": string</li>
                            <li>"tshirt_number": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>

                        </td>
                        <td>Cria um jogador</td>
                    </tr>

                    <tr>
                        <td>PUT</td>
                        <td>api/players/{player}</td>
                        <td>
                        <code>
                        <ul>
                            <li>"name": string</li>
                            <li>"cpf": string</li>
                            <li>"tshirt_number": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>

                        </td>
                        <td>Atualiza um jogador</td>
                    </tr>

                    <tr>
                        <td>PUT</td>
                        <td>api/players/{player}</td>
                        <td>
                        <code>
                        <ul>
                            <li>"team_id": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>

                        </td>
                        <td>Atualiza o time do jogador. O endpoint verifica a quantidade de jogares por time e libera ou n??o o update</td>
                    </tr>

                    <tr>
                        <td>GET</td>
                        <td>api/players/{player}</td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>Mostra um jogador</td>
                    </tr>
                </tbody>


                <tbody>
                    <tr colspan="5">
                        <td><h4><b>Rankings</b></h4></td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/rankings</td>
                        <td>

                        </td>
                        <td>
                        <code>
                        <ul>
                            <li>"order_field": string</li>
                            <li>"order_direction": string</li>
                            <li>"limit": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>Lista o ranking dos times e jogadores</td>
                    </tr>
                </tbody>


                <tbody>
                    <tr colspan="5">
                        <td><h4><b>Times</b></h4></td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/teams</td>
                        <td>

                        </td>
                        <td>
                        <code>
                        <ul>
                            <li>"order_field": string</li>
                            <li>"order_direction": string</li>
                            <li>"limit": number</li>
                        </ul>
                        </code>
                        </td>
                        <td>Lista todos os times e os respectivos jogadores</td>
                    </tr>
                    <tr>
                        <td>POST</td>
                        <td>api/teams</td>
                        <td>
                        <code>
                        <ul>
                            <li>"name": string</li>
                        </ul>
                        </code>
                        </td>
                        <td>

                        </td>
                        <td>Cria um novo time</td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/teams/{team}</td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>Mostra um time e seus jogadores</td>
                    </tr>
                    <tr>
                        <td>PUT</td>
                        <td>api/teams/{team}</td>
                        <td>
                        <code>
                        <ul>
                            <li>"name": string</li>
                        </ul>
                        </code>
                        </td>
                        <td>

                        </td>
                        <td>Atualiza um time</td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>api/teams/{team}/players</td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>Lista os jogadores de um time</td>
                    </tr>

                </tbody>
            </table>

            <br/>

            <h2>Testes</h2>
            <p>
                Foram criados testes para garantir a consist??ncia dos endpoints. Para os testes funcionarem ?? necess??rio criar um banco de dados especifico para eles e adicionar as configura????es em um arquivo <code>.env.testing</code><br/>
                <br/>
                Para rodar os testes:<br/>

                <code>
                    php artisan test
                </code>
            </p>
        </div>

    </body>

    <footer>
        <div class="container">
            API criada por <code>Igor Vieira de Mello</code>
        </div>
    </footer>
</html>
