// troca de imagens com DOM, usando mouse enter e mouse leave
const imagem = document.getElementById('imagemMarie');

if (imagem) {
  imagem.addEventListener('mouseenter', function() {
    imagem.src = 'imagens/foto-marie2.jpg'; // muda imagem mouse em cima
  });

  imagem.addEventListener('mouseleave', function() {
    imagem.src = 'imagens/foto-marie1.jpg'; // volta imagem 1
  });
}

// código dentro do DOMContentLoaded para garantir que o DOM esteja pronto
document.addEventListener("DOMContentLoaded", function () {
  // Mostrar mais
  const botao = document.getElementById("botao-toggle");
  const textoCompleto = document.getElementById("texto-completo");

  if (botao && textoCompleto) {
    botao.addEventListener("click", function () {
      if (textoCompleto.classList.contains("escondido")) {
        textoCompleto.classList.remove("escondido");
        botao.innerText = "Mostrar Menos";
      } else {
        textoCompleto.classList.add("escondido");
        botao.innerText = "Mostrar Mais";
      }
    });
  }

  // Esconder o bloco login no início
  const loginBloco = document.getElementById("login-bloco");
  if (loginBloco) {
    loginBloco.style.display = "none";
  }

  // Função global para mostrar login
  window.mostrarLogin = function () {
    if (loginBloco) {
      loginBloco.style.display = "block";
    }
  };

  // Captura do formulário de login e mensagem
  const form = document.getElementById('loginForm');
  const messageDiv = document.getElementById('loginMessage');

  if (form && messageDiv) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch('http://localhost:8000/login.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (!response.ok) throw new Error('Resposta da rede não OK');
        return response.json();
      })
      .then(data => {
        if (data.success) {
          messageDiv.style.color = 'green';
          messageDiv.textContent = data.message || 'Login realizado com sucesso!';
        } else {
          messageDiv.style.color = 'red';
          messageDiv.textContent = data.message || 'Erro no login.';
        }
      })
      .catch(error => {
        messageDiv.style.color = 'red';
        messageDiv.textContent = 'Erro ao conectar com o servidor de banco de dados.';
        console.error('Fetch error:', error);
      });
    });
  }
});
