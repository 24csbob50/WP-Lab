
class Product {
    constructor(id, name, price, image) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.image = image;
    }

    createProductElement() {
        const productElement = document.createElement("div");
        productElement.classList.add("product");

        const image = document.createElement("img");
        image.src = this.image;
        productElement.appendChild(image);

        const productName = document.createElement("h4");
        productName.textContent = this.name;
        productElement.appendChild(productName);

        const productPrice = document.createElement("p");
        productPrice.textContent = `$${this.price}`;
        productElement.appendChild(productPrice);

        const button = document.createElement("button");
        button.textContent = "Add to Cart";
        button.addEventListener("click", () => this.addToCart());
        productElement.appendChild(button);

        productName.style.fontSize = "smaller";
        productPrice.style.fontSize = "smaller";

        return productElement;
    }

    addToCart() {
        cart.addProductToCart(this);
    }
}



        class Cart {
            constructor() {
                this.items = [];
                this.cartElement = document.getElementById("cart-items");
            }

            addProductToCart(product) {
                const productInCart = this.items.find(item => item.product.id === product.id);

                if (productInCart) {
                    productInCart.quantity += 1;
                } else {
                    this.items.push({ product: product, quantity: 1 });
                }

                this.updateCartUI();
                this.updatePrice();
            }

            updateCartUI() {
                this.cartElement.innerHTML = "";
                this.items.forEach(item => {
                    const cartItemElement = document.createElement("div");
                    cartItemElement.classList.add("cart-item");

                    const itemInfo = document.createElement("span");
                    itemInfo.textContent = `${item.product.name} x ${item.quantity} - $${(item.product.price * item.quantity).toFixed(2)}`;
                    cartItemElement.appendChild(itemInfo);
                    this.cartElement.appendChild(cartItemElement);
                });
            }


        }
        

        const cart = new Cart();

        const products = [
            new Product(1, "Laptop", 999.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(2, "Smartphone", 599.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(3, "Headphones", 199.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(4, "Watch", 149.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(4, "Wireless earphones", 49.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(4, "Keyboard", 300.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(4, "Xiaomi 15 Ultra", 500, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
            new Product(4, "Smart Security Camera", 250, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
        ];

        const productListElement = document.getElementById("product-list");
        products.forEach(product => {
            const productElement = product.createProductElement();
            productListElement.appendChild(productElement);
        });
