/*----------------------------------------------index---------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    // Adicionar funcionalidade ao botão de alternância do modo escuro
    const toggleDarkModeButton = document.querySelector('.toggle-dark-mode');
    toggleDarkModeButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        // Adicionar lógica para persistir o estado do modo escuro
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    });
    const backButton = document.querySelector('.back-button');
    backButton.addEventListener('click', () => {
        window.location.href = 'index.html'; // Altere 'paginainicial.html' para o caminho correto
    });
    
    // Verificar se o modo escuro foi ativado anteriormente
    const isDarkModeEnabled = localStorage.getItem('darkMode') === 'true';
    if (isDarkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
});

/*----------------------------------------------agenda--------------------------------------------*/
function adicionarCompromisso() {
    // Obter os valores dos campos de entrada
    const nome = document.getElementById('nome').value;
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    // Verificar se todos os campos estão preenchidos
    if (nome && data && hora) {
        // Selecionar o elemento da agenda
        const agenda = document.getElementById('agenda');

        // Criar um novo elemento de evento
        const evento = document.createElement('div');
        evento.classList.add('evento');

        // Criar um elemento de título para o compromisso e definir seu conteúdo
        const nomeCompromisso = document.createElement('h3');
        nomeCompromisso.textContent = nome;

        // Criar um elemento de detalhes para a data e hora do compromisso e definir seu conteúdo
        const detalhes = document.createElement('p');
        detalhes.textContent = `Data: ${data}, Hora: ${hora}`;

        // Adicionar os elementos de título e detalhes ao elemento de evento
        evento.appendChild(nomeCompromisso);
        evento.appendChild(detalhes);

        // Adicionar o evento à agenda
        agenda.appendChild(evento);

        // Limpar os campos de entrada após adicionar o compromisso
        document.getElementById('nome').value = '';
        document.getElementById('data').value = '';
        document.getElementById('hora').value = '';
    } else {
        // Exibir uma mensagem de alerta se algum campo estiver em branco
        alert('Por favor, preencha todos os campos.');
    }
}
/*-----------------------------------------------login----------------------------------------------*/
const signinLink = document.getElementById('signin-link');
        const signupLink = document.getElementById('signup-link');
        const signinForm = document.getElementById('signin-form');
        const signupForm = document.getElementById('signup-form');

        // Adiciona os manipuladores de evento para os links
        signinLink.addEventListener('click', function(event) {
            event.preventDefault(); // Previne o comportamento padrão do link
            // Exibe o formulário de Sign In, esconde o de Sign Up
            signinForm.style.display = 'block';
            signupForm.style.display = 'none';
        });

        signupLink.addEventListener('click', function(event) {
            event.preventDefault(); // Previne o comportamento padrão do link
            // Exibe o formulário de Sign Up, esconde o de Sign In
            signinForm.style.display = 'none';
            signupForm.style.display = 'block';
        });
/*-------------------------------------------------mentor---------------------------------------------*/
function centerMentor(element) {
    const activeCards = document.querySelectorAll('.mini-card.active');
    activeCards.forEach(card => {
        card.classList.remove('active');
    });
    element.querySelector('.mini-card').classList.add('active');
}
