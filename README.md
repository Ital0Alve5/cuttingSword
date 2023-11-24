# Projeto Cutting Sword

![cuttingSwordLogo](https://cdn.discordapp.com/attachments/1172313929909817447/1177412036326608896/people-fighting-with-swords-that-looks-like-a-game-upscaled1.png?ex=65726968&is=655ff468&hm=35dd1ce60e9c8c6a057c7937ed27b20d6a143fea6fd70e0db3436a661e7cd5d7&)

## Trabalho Prático DS122

Criado e desenvolvido por:
- Heitor Plinta de Oliveira
- Ítalo Alves de Paula e Silva
- Yasmim Zedelinski Belão Rodrigues

## Índice
- <a href="#jogo">Jogo</a>
- <a href="#funcionalidades">Funcionalidades gerais</a>
- <a href="#tabelas">Tabelas</a>
- <a href="#ligas">Ligas</a>
- <a href="#como-rodar-o-jogo">Como rodar o jogo</a>
- <a href="#estrutura-do-código">Estrutura do código</a>

### Jogo
![jogo](https://cdn.discordapp.com/attachments/1172313929909817447/1177416722765062194/2023-11-23_22-12.png?ex=65726dc6&is=655ff8c6&hm=a95af989e31a85a99c3164b08e5d63c7d7c7745adcecbdaccea70cd63e5a8c73&)

Um jogo de luta onde o lutador que causar mais dano ao inimigo vence. O jogo pode ser jogado por dois jogadores simultaneamente no mesmo dispositivo ou um jogador contra a máquina.
Caso o jogador jogue contra a máquina, há 5 dificuldades disponíveis:
- Fácil
- Normal
- Difícil
- Muito Difícil
- Impossível  

Em cada dificuldade o bot aumenta sua capacidade de lutar.

Há um sistema de pontuação em que um algorítimo calcula uma relação entre o tempo jogado + dificuldade + dano dado.

### Funcionalidades

O jogador será inicilamente recebido na página home.

![home](https://cdn.discordapp.com/attachments/1172313929909817447/1177421136372433007/2023-11-23_22-30.png?ex=657271e2&is=655ffce2&hm=3b850603dbce56f23ca06a7acc7d3f02ca5f48321fb3560ce2a16e6cc50a7cf6&)

Para ser direcionado para qualquer outra área no site o usuário precisa estar logado. Para logar ele poder tentar acessar qualquer página, pois ele será redirecionado para a área de login.

### Tabelas

Há 5 tabelas disponíveis para os usuários verem sua reputação e compara-lá com a de outros jogadores:

- Histórico  
Essa tabela mostra todas as partidas jogadas pelo jogador. Nela já estão implementadas todas informações como dificuldade do jogo, pontos, data da partida...

- Ranking Global  
Nesta seção temos duas tabelas, as de ranking total e as de ranking semanal. Todos os jogos de todos jogadores aparecerão nessa tabela. 

- Ranking da Liga  
Também com duas tabelas (total e semanal), porém aqui aparecem apenas informações sobre os jogadores da liga em que o usuário está inserido no momento.

### Ligas
O sistema de ligas é bem simples. Serve como um filtro para competir em um grupo menor de pessoas dentro da liga. Para criar uma liga basta colocar um nome e uma palavra-chave. Qualquer outro usuário que tem acesso ao nome e a respectiva palavra-chave terá acesso a participar da liga.

### Como rodar o jogo
1. Crie uma conexão loopback na porta 5200
```
php -S 127.0.0.1:5200
```
2. Entre no IP.

### Estrutura do código

O código foi escrito usando o padrão MVC(Model, View, Controller). Fazendo uma breve sintetização de todo o código por file, temos:

- app  
   Aqui temos classes fundamentais para o andamento da página, como o CORS e as rotas.

- assets  
Todas as imagens, o CSS e os códigos em JavaScript de todo o projeto estão aqui. Incluindo na pasta 'js' temos todo o funcionamento do jogo, todas as requests feitas do front-end para o back-end, além de mensagens de erro e funções de sanitização de dados.

- controllers  
Dividimos os controllers em 'web' e 'api'. A parte web faz redirecionamentos e proteções de paǵina. Já a parte de api é responsável por encaminhar as informações solicitadas pelo front.

- models  
Aqui temos a parte que cria a relação com o banco de dados, além de todo o SQL que será eventualmente usado pelo controller está nessa pasta. Temos também uma classe seeder para preencher a tabela.

- routers  
Aqui temos todas as rotas dentro do site e seus respectivos controllers responsáveis por lidar com a requisição.

- view  
Toda a parte visual está aqui. Estão divididas todas as páginas possíveis que o usuário pode acessar no site, incluindo as páginas não encontradas.
