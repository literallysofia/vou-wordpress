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

Olá novamente, eis as novas instruções.

**Para compilar tudo:**
```bash
$ gulp build
```

**Para limpar tudo o que foi compilado:**
```bash
$ gulp clean
```

**Para desenvolver código:**

```bash
$ gulp
```

Este comando está preparado para dar *watch* aos ficheiros do ```src``` que são onde vamos trabalhar. Sempre que fizeres alguma alteração a um deles, ele dá update e refresh no browser automáticamente. Não tens que te chatear! Os ficheiros que ele ~está só a ver~ são: **php, js, scss, images**.

**ATENÇÃO**

Tive que dar refactor ao ```gulpfile.js``` inteiro pois não estava de acordo com a nova documentação deles (versão 4). É necessário teres atenção a duas coisas para o *watch* funcionar como deve ser:

1) Deverás estár a correr o teu site em ```localhost:8888/vou```, como eu tenho com o MAMP por exemplo (check ```gulpfile.js line 134```).
2) Quando estás a correr o comando de *watch* ele simula o que tens a correr na porta 8888 para a porta 3000, portanto, para veres as mudanças automáticamente deves ir ao ```http://localhost:3000/vou```.

Ah e já meti o bootstrap nisto.

Beijinho e continuação! :heart:

## License
This theme is licensed under the GNU General Public License.