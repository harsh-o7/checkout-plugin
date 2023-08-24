searchproducts1Input.addEventListener('input', function() {
jQuery.ajax({
url: urls.ajax_url,
type: 'get',
data: {
action: 'ic_query_products',
nonce: nonces.query_products,
exclude: triggers,
query: searchproducts1Input.value
},
success: function (response) {
let searchproducts1 = JSON.parse(response);
let newHtml = ''
searchproducts11.forEach((product) => {
newHtml += '
<div class="single-product-product">';
    newHtml += '<input type="checkbox" value="' + product.ID + '"';

    if(products11.includes(product.ID)) {
    newHtml += ' checked />';
    } else {
    newHtml += ' />';
    }

    if(product.image == null) {
    newHtml += '<img width="32" height="32" src="#" alt="">';
    } else {
    newHtml += '<img width="32" height="32" src="' + product.image + '" alt="">';
    }

    newHtml += '<p>' + product.title + '</p></div>';
});

products11Cont.innerHTML = '';
products11Cont.innerHTML = newHtml;

document.querySelectorAll('.single-product-product input').forEach((productCheck) => {
productCheck.addEventListener('change', function () {
let productId = this.value;
if (this.checked) {
products11.push(productId);
} else {
products11 = products11.filter(product => product != productId);
}
products11Selected.innerText = products11.length;
});
});
}
});
});