var linhas = document.querySelectorAll("tbody tr");

    linhas.forEach(function(linha) {
        linha.addEventListener('click', function() {
            
            if(this.classList.contains('linha-selecionada')){
            this.classList.remove('linha-selecionada');
            
        } else {
            limparSelecao();
            this.classList.add('linha-selecionada');
        }

        return;
        });
    });

    function limparSelecao() {
        linhas.forEach(function(linha) {
            linha.classList.remove('linha-selecionada');
        });
    }