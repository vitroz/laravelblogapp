
- Pré-requisitos: 
- instalar o mysql (ver 5.7) a versão mais nova (8 nao funciona direto out of the box)
- instalar o composer
------
- clonar o repositorio
-criar database (dbblog) ou outra de sua prefencia (porem deve-se alterar a variavel DB_DATABASE no arquivo .env, na raiz do projeto)

- subir o servidor ('php artisan serve' no terminal)
- php artisan migrate
- php artisan db:seed (pra criar o usuario do login)
- para logar no app (utilizar o usuario criado no seed: vitor@mail.com : senha: 123456) ou criar outro usuario.
