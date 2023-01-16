var cpf = document.getElementById("cpf");
var maskCpfOptions = {
    mask: '000.000.000-00',
    maxLength: 11
};

var cnpj = document.getElementById("cnpj")
var maskCnpjOptions ={
    mask: '00.000.000/0000-00',
    maxLength: 14
}

var cep = document.getElementById("cep");
var maskCepOptions = {
    mask: '00000-000',
    maxLength: 8
};

var telefone = document.getElementById("telefone");
var maskTelefoneOptions = {
    mask: [{ mask: '(00) 0000-0000' }, { mask: '(00) 00000-0000' }],
    maxLength: 15
};


IMask(cpf, maskCpfOptions);
IMask(cnpj,maskCnpjOptions);
IMask(cep, maskCepOptions);
IMask(telefone, maskTelefoneOptions);


