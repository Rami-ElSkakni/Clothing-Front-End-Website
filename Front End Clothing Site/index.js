
let carts = document.getElementsByClassName('product-btn btn-cart')
let products = [
    {
        name: 'White T-shirt',
        tag: 'stock',
        price: 20,
        inCart: 0
    },
    {
        name: 'Black T-shirt',
        tag: 'stock2',
        price: 20,
        inCart: 0
    },
    {
        name: 'Yellow T-shirt',
        tag: 'stock3',
        price: 20,
        inCart: 0
    }
];

for (let i = 0; i < carts.length; i++) {
    let button = carts[i]
    button.addEventListener('click', () => {

        cartNumb(products[i]);
        totalCost(products[i])
    })
}
function onLoadNumb() {
    let productNumb = localStorage.getItem('cartNumb');
    if (productNumb) {
        document.querySelector('.cartspan').textContent = productNumb;
    }
}
function cartNumb(product) {
    let productNumb = localStorage.getItem('cartNumb');
    productNumb = parseInt(productNumb);
    if (productNumb) {
        localStorage.setItem('cartNumb', productNumb + 1);
        document.querySelector('.cartspan').textContent = productNumb + 1;
    } else {
        localStorage.setItem('cartNumb', 1);
        document.querySelector('.cartspan').textContent = 1;
    }
    AssmbItems(product);
}
function AssmbItems(product) {
    let cartItem = localStorage.getItem('productsInCart');
    cartItem = JSON.parse(cartItem);

    if (cartItem != null) {

        if (cartItem[product.tag] == undefined) {
            cartItem = {
                ...cartItem,
                [product.tag]: product
            }
        }

        cartItem[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItem = {
            [product.tag]: product
        }
    }



    localStorage.setItem("productsInCart", JSON.stringify(cartItem))
}
function totalCost(product) {
    let cartCost = localStorage.getItem('totalCost');

    console.log("My cartCost is", cartCost);
    console.log(typeof cartCost);

    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}


onLoadNumb();
