var linhas = document.querySelectorAll("tbody tr");

    linhas.forEach(function(linha) {
        linha.addEventListener('click', function() {
            
            if(this.classList.contains('linha-selecionada')){
            this.classList.remove('linha-selecionada');
            
        } else {
            limparSelecao();
            this.classList.add('linha-selecionada');

            var itemId = this.getAttribute('data-id');

            var linkEditar = document.getElementById('btn_editar');
            linkEditar.href = linkEditar.href.slice(0, linkEditar.href.lastIndexOf('/') + 1) + "editar?item_id=" + itemId;

            var linkExcluir = document.getElementById('btn_excluir');
            linkExcluir.href = linkExcluir.href.slice(0, linkExcluir.href.lastIndexOf('/') + 1) + itemId;

        }

        return;
        });
    });

    function limparSelecao() {
        linhas.forEach(function(linha) {
            linha.classList.remove('linha-selecionada');
        });
    };

    