function MascaraCNPJ(cnpj) {
    if (mascaraInteiro(cnpj) == false) {
        event.returnValue = false;
    }
    return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
    var boleanoMascara;

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace(exp, "");

    var posicaoCampo = 0;
    var NovoValorCampo = "";
    var TamanhoMascara = campoSoNumeros.length;;

    if (Digitato != 8) { // backspace
        for (i = 0; i <= TamanhoMascara; i++) {
            boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".") ||
                (Mascara.charAt(i) == "/"))
            boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(") ||
                (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            } else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        return true;
    } else {
        return true;
    }
}

//valida numero inteiro com mascara
function mascaraInteiro() {
    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
        return false;
    }
    return true;
}

function dataFormat(valor) {
    var dataAtual = new Date(valor); //data.ultima_atualizacao
    var monName = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
        "Setembro",
        "Outubro", "Novembro", "Dezembro");

    var dia = dataAtual.getDate();
    var mes = monName[dataAtual.getMonth()];
    var ano = dataAtual.getFullYear();
    var horas = dataAtual.getHours();
    var minutos = dataAtual.getMinutes();
    var segundos = dataAtual.getSeconds();
    var texto = dia + " de " + mes + " de " + ano + " às " + horas + ":" + minutos + ":" + segundos;
    return texto;
}

function valorReal(valor) {
    var realDecimal = parseFloat(valor); //data.capital_social
    var valorReal = realDecimal.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
    });
    return valorReal;
}

var data = JSON.parse(document.getElementById('data').innerHTML);
$.each(data.atividade_principal, function (i, valores) {
    document.getElementById('fiscal_descricao').innerHTML = valores.text;
});

if (data.atividades_secundarias[0].code != '00.00-0-00') {
    let table = '<thead><tr><th>Código</th><th>Descrição</th></tr></thead><tbody>';

    data.atividades_secundarias.forEach(function (valor, chave) {
        table += '<tr><td>' + valor.code + '</td>';
        table += '<td>' + valor.text + '</td></tr>';
    });
    $('#table_atividade_eco').empty().html(table);
} else {
    $('#table_atividade_eco').empty().html("Atividade Econômica não encontrada.");
}
if (data.qsa != null) {
    let table = '<thead><tr><th>Nome</th><th>Cargos</th></tr></thead><tbody>';
    data.qsa.forEach(function (valor, chave) {
        table += '<tr><td>' + valor.nome + '</td>';
        table += '<td>' + valor.qual.substr(3) + '</td></tr>';
    });
    $('#table_socio').empty().html(table);
} else {
    $('#table_socio').empty().html("Atividade Econômica não encontrada.");
}

//console.log(data);
document.getElementById('nome').innerHTML = data.nome;
document.getElementById('cnpj').innerHTML = data.cnpj;

document.getElementById('nome_empresarial').innerHTML = data.nome;
document.getElementById('numero_inscricao').innerHTML = data.cnpj;
document.getElementById('numero_inscricao_matriz').innerHTML = data.tipo;

document.getElementById('data_inicio_atividade').innerHTML = data.abertura;

document.getElementById('ultima_atualizacao').innerHTML = dataFormat(data.ultima_atualizacao);

document.getElementById('logradouro').innerHTML = data.logradouro;

document.getElementById('numero').innerHTML = data.numero;
document.getElementById('cep').innerHTML = data.cep;
document.getElementById('bairro').innerHTML = data.bairro;
document.getElementById('municipio').innerHTML = data.municipio;
document.getElementById('uf').innerHTML = data.uf;

document.getElementById('telefone_1').innerHTML = data.telefone;

document.getElementById('capital_social').innerHTML = valorReal(data.capital_social);
