

var botaoPessoaFisica = document.getElementById("pessoa-fisica")
var botaoPessoaJuridica = document.getElementById("pessoa-juridica")

var divCpf = document.getElementById("cpf-div")
var divCnpj = document.getElementById("cnpj-div")

var inputCpf = document.getElementById("cpf")
var inputCnpj = document.getElementById("cnpj")




botaoPessoaFisica.addEventListener("click", () =>{
   botaoPessoaFisica.classList.add("ativo");
   botaoPessoaJuridica.classList.remove("ativo");

   divCpf.classList.add("ativo-form");
   inputCpf.disabled = false;

   divCnpj.classList.remove("ativo-form");
   inputCnpj.disabled = true
});

botaoPessoaJuridica.addEventListener("click", () =>{
    botaoPessoaJuridica.classList.add("ativo");
    botaoPessoaFisica.classList.remove("ativo")

    divCpf.classList.remove("ativo-form");
    inputCpf.disabled = true;

    divCnpj.classList.add("ativo-form");
    inputCnpj.disabled = false;
})

