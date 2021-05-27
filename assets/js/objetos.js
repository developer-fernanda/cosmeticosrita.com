let Venda = {
    nomeProduto: "Florata",
    quantidade: 24,
    valor: 99.99,
    
    total: function() {
        return this.valor * this.quantidade
    },

    fechaVenda: function(nomeCliente) {
        return nomeCliente + ', venda realizada! ' + 'R$ ' + this.total();
    }
}

var Cliente = {
    nome: "Fernanda",
    sobrenome: "Ingrid",
    
    mostraNomeCompleto: function() {
        return this.nome + ' ' + this.sobrenome;
    }
}


console.log(Venda.fechaVenda(Cliente.mostraNomeCompleto()));