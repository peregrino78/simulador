## Sistema de Simulação de Propostas para Crédito Consignado

> Trabalho de conclusão de curso em Sistemas de Informação pela ULBRA   
> V. 2.0


### Sobre o sistema
- Gerenciamento de Usuários
- Gerenciamento de Permissões
- Gerenciamento de Clientes  
- Gerenciamento das Taxas do Banco  
- Simulações de Crédito Consignado  
	- Tipos de operação (Contrato Novo, Portabilidade e Refinanciamento)
- Histórico de Simulações
- Gerenciamento da Aplicação

### Tecnologias utilizadas: 
#### Frontend
- HTML5
- CSS3
- Bootstrap
- JavaScript
- JQuery

#### Backend
- PHP 7.2
- Laravel 5.7
- Composer
- PHPUnit

#### Banco de Dados
- MySQL

---

### Instalação

#### Backend
- $ composer install  
- $ composer update

#### Banco de Dados
- Pré requisito: configurar o arquivo `.env`
- Pré requisito: criar o banco de dados  
- $ php artisan migrate
- $ php artisan db:seed

---

### Reponsáveis
Igor Santos – [@IgorSantos17](https://github.com/IgorSantos17) – igors.d@hotmail.com



Esse sistema é `Open Source` e contém `Licensa MIT`.