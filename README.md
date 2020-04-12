# VO.U. WordPress Theme

Project description.

**Authors:** [Sofia Silva](https://github.com/literallysofia) and [Luís Correia](https://github.com/luigicorreia)

## Requirements

This theme follows [WordPress recommended requirements](https://wordpress.org/about/requirements/). Make sure you have all these dependences installed before moving on:

* WordPress
* PHP
* Node.js
* Gulp

## Instructions

Basicamente basta fazeres o comando de baixo e tudo o que está na pasta ```src``` é compilado e copiado para fora (aka o diretório do tema em si para o wp interpretar). Deves "programar" sempre dentro do ```src```, o que o comando gera é só para testar (e é ignorado pelo git nos commits).

```bash
$ gulp build
```

Este comando seguinte limpa tudo o que foi gerado. Quando corres o de cima ele automaticamente limpa primeiro e depois gera. Mas dá sempre jeito saber. Para mais informações vai ao ```gulpfile.js```, isto são "tasks".

```bash
$ gulp clean
```

Beijinho e obrigada por ajudares! :heart:

## License
This theme is licensed under the GNU General Public License.