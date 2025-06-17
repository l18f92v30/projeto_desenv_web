# Site sobre Marie Curie

Site desenvolvido com fins educacionais, apresentando a biografia, curiosidades, cronologia de prêmios e uma galeria de fotos sobre a vida e o legado de Marie Curie, uma das maiores cientistas da história.

Este projeto faz parte da disciplina de Desenvolvimento Web, ministrada pelo professor Andre Luiz Avelino.

## Tecnologias utilizadas

- HTML5 – Estrutura das páginas  
- CSS3 – Estilização das páginas  
- JavaScript – Interatividade  
- PHP – Programação backend para processamento de formulários e lógica do servidor  
- MySQL – Banco de dados relacional para armazenamento de usuários e informações  
- SQL – Linguagem para manipulação dos dados no banco  

## Funcionalidades e recursos aplicados

- Navegação entre páginas com menu fixo  
- Estilização: Flexbox, Pseudo-classes (:hover, :active), Pseudo-elementos (::before, ::after), bordas arredondadas, sombras e efeitos visuais  
- Interatividade com JavaScript: Botão "Mostrar Mais" na biografia  
- Tabela: Cronologia da carreira em formato tabela  
- Galeria de Fotos: Layout responsivo com efeito hover e ampliação das imagens  
- Sistema de autenticação com PHP e MySQL: cadastro e login de usuários com verificação de senha segura (hashing)  
- Comunicação assíncrona via fetch API para envio e recebimento de dados sem recarregar a página  
- CRUD básico para gerenciamento de usuários no banco de dados  
- Tratamento de erros e respostas em JSON para interação eficiente entre frontend e backend  

## Estrutura do projeto

- `index.html`, `curiosidades.html`, `premios.html`, `fotos.html` e `cadastro.html` – Páginas estáticas do site  
- `css/style.css` – Arquivo de estilos  
- `js/script.js` – Arquivo JavaScript com manipulação do DOM e comunicação com backend  
- `login.php` e `cadastro.php` – Scripts PHP para autenticação e registro, conectando ao banco MySQL  
- Banco de dados MySQL configurado em servidor linux para armazenar usuários e dados do site  

---

Projeto desenvolvido para aprendizado prático de desenvolvimento web full stack, incluindo frontend e backend.
