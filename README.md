<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<br />
<div align="center">
    <a href="https://fabiorangel.com.br/"> <img src="https://fabiorangel.com.br/public/img/logo_novo.png" alt="Logo" width="200" > <br>   Site do Desenvolvedor</a>
<br><br>
  </div>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## :page_facing_up: Descrição

Esse sistema vai sorteasse as equipes, com base nas habilidades de cada jogador e assim poupar tempo.

* Armazenamos dados  Nome, nível, status, posição (nivel de 1 a 5, sendo 1 o pior e 5 o melhor), posição (Jogador , Goleiro) , status ( Compareceu,null ).
* Check Box de Confirmação de Presença.
* Configuração de time em campo ( tipo de campo e quantidade de jogadores ).
* Sortei de Jogadores por Times equalizando os níveis
* Quando houver mais de dois times completos, é permitido ao último time ficar com o número de jogadores menor do que aquele definido
pelo usuário.

<p>Regras</p>
* Não permitir que um time tenha um número maior de jogadores do que foi determinado pelo usuário antes do sorteio.
* Não permitir o sorteio, caso o número total de confirmados seja menor que Nj*2, sendo 'Nj' o número de jogadores por time (ex: para
um sorteio com 5 jogadores por time, o mínimo de confirmados deve ser 10).
* Não permitir mais de 1 goleiro no mesmo time.
- Será um diferencial para o desenvolvedor, se a aplicação considerar o nível dos jogadores ao executar o sorteio, deixando os times o mais
balanceado possível (ninguém quer jogar no time dos "perebas", nem jogar contra o time da "panelinha").


<p>Acesso a demonstração do Sistema</p>
https://fabiorangel.com.br/futebol/sorteio

## :computer: Técnologia
- Laravel 8.83
- Utilizado PHP 7.0
- Mysql
- javascript
- Ajax


## 🗒️ Ferramentas
- Sorteio
- Tela de Sorteio



## :handshake: Colaboradores
<table>
  <tr>
    <td align="center">
      <a href="http://github.com/tatialveso">
        <img src="https://fabiorangel.com.br/public/images/fh.jpg" width="100px;" alt="Foto de Tati Alves no GitHub"/><br>
        <sub>
          <b>Fabio Rangel</b>
        </sub>
      </a>
    </td>
  </tr>
</table>



## License
