document.addEventListener("DOMContentLoaded", function () {
  const botao = document.getElementById("botao-toggle");
  const textoCompleto = document.getElementById("texto-completo");

  botao.addEventListener("click", function () {
    if (textoCompleto.classList.contains("escondido")) {
      textoCompleto.classList.remove("escondido");
      botao.innerText = "Mostrar Menos";
    } else {
      textoCompleto.classList.add("escondido");
      botao.innerText = "Mostrar Mais";
    }
  });
});

// troca de imagens com DOM, usando mouse enter e mouse leave
const imagem = document.getElementById('imagemMarie');

imagem.addEventListener('mouseenter', function() {
  imagem.src = 'imagens/foto-marie2.jpg'; // muda imagem mouse em cima
});

imagem.addEventListener('mouseleave', function() {
  imagem.src = 'imagens/foto-marie1.jpg'; // volta imagem 1
});
