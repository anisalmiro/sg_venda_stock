function subtotall() {
    var quant = parseFloat(document.getElementById('stk_quant').value);
    var preco = parseFloat(document.getElementById('stk_preco').value);
    document.getElementById('stk_subtotal').value = quant * preco;
    ival();
    if (document.getElementById('stk_ivaincluido').checked == true) {
        document.getElementById('stk_subtotal').value = parseFloat((Number.parseFloat(quant) * Number.parseFloat(preco)) - Number.parseFloat(document.getElementById('stk_valoriva').value)).toFixed(2);
    }
    totall();
}//Fim function

function ival() {
    var perciva = 0;
    var subtotall = parseFloat(
        document.getElementById("stk_subtotal").value
    ).toFixed(2);
    var tabiva = document.getElementById('stk_tabivaid').value;
    if (tabiva == 2) {
        perciva = 0.17;
    }
    document.getElementById("stk_valoriva").value = parseFloat(
        Number.parseFloat(perciva) * Number.parseFloat(subtotall)
    ).toFixed(2);
    totall();

}//Fim function

function totall() {
    var subtotall = parseFloat(document.getElementById('stk_subtotal').value).toFixed(2);
    var descontol = parseFloat(document.getElementById('stk_valordesconto').value).toFixed(2);
    var valoriva = parseFloat(
        document.getElementById("stk_valoriva").value
    ).toFixed(2);
    document.getElementById('stk_total').value = 0;
    document.getElementById('stk_total').value = parseFloat((Number.parseFloat(subtotall) - Number.parseFloat(descontol)) + Number.parseFloat(valoriva)).toFixed(2);
}//Fim function

function total() {
    var total = 0;
    var subtotal = 0;
    var iva = 0;
    var desconto = 0;
    var elementsDesconto = document.getElementsByName("l_valordesconto[]");
    var elementsDesconto2 = document.getElementsByName("valordesconto_l[]");
    var elementsIva = document.getElementsByName("l_valoriva[]");
    var elementsIva2 = document.getElementsByName("valoriva_l[]");
    var elementsSubtotal = document.getElementsByName("l_subtotal[]");
    var elementsSubtotal2 = document.getElementsByName("subtotal_l[]");
    var elementsTotal = document.getElementsByName("l_total[]");
    var elementsTotal2 = document.getElementsByName("total_l[]");

    for (var i = 0; i < elementsTotal.length; i++) {
        total += parseFloat(Number.parseFloat(elementsTotal[i].value));
        subtotal += parseFloat(elementsSubtotal[i].value);
        iva += parseFloat(elementsIva[i].value);
        desconto += parseFloat(elementsDesconto[i].value);
    } //Fim for

    for (var i = 0; i < elementsTotal2.length; i++) {
        total += parseFloat(Number.parseFloat(elementsTotal2[i].value));
        subtotal += parseFloat(elementsSubtotal2[i].value);
        iva += parseFloat(elementsIva2[i].value);
        desconto += parseFloat(elementsDesconto2[i].value);
    } //Fim for

    document.getElementById("c_total").value = total;
    document.getElementById("c_subtotal").value = subtotal;
    document.getElementById("c_totaliva").value = iva;
    document.getElementById("c_valordesconto").value = desconto;
}//Fim function 