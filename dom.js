
const toggle = document.querySelector('#toggle');
        toggle.addEventListener('change', () => {
            document.body.classList.toggle('dark');
        });

        let countdown;
        let timeLeft = 0;
        let isRunning = false;

        const timerDisplay = document.getElementById('timer-display');
        const startBtn = document.getElementById('start-btn');
        const pauseBtn = document.getElementById('pause-btn');
        const resetBtn = document.getElementById('reset-btn');
        const timerInput = document.getElementById('timer-input');

        startBtn.addEventListener('click', () => {
            const inputTime = parseInt(timerInput.value);
            if (inputTime > 0) {
                timeLeft = inputTime;
                isRunning = true;
                updateDisplay();
                document.body.style.backgroundColor = "";

                startTimer();
                toggleButtons();
            }
        });

        pauseBtn.addEventListener('click', () => {
            clearInterval(countdown);
            isRunning = false;
            toggleButtons();
        });

        resetBtn.addEventListener('click', () => {
            clearInterval(countdown);
            timeLeft = 0;
            isRunning = false;
            updateDisplay();
            document.body.classList.remove('green-bg', 'yellow-bg', 'red-bg'); 
             document.body.style.backgroundColor = "#afafaf";
            toggleButtons();
        });

        function startTimer() {
            countdown = setInterval(() => {
                if (timeLeft > 0) {
                    timeLeft--;
                    updateDisplay();
                    changeBackgroundColor();
                } else {
                    clearInterval(countdown);
                    isRunning = false;
                    toggleButtons();
                }
            }, 1000);
        }

        function updateDisplay() {
            timerDisplay.textContent = timeLeft;
        }

        function changeBackgroundColor() {
            if (timeLeft > 10) {
                document.body.classList.remove('yellow-bg', 'red-bg');
                document.body.classList.add('green-bg');
            } else if (timeLeft > 5) {
                document.body.classList.remove('green-bg', 'red-bg');
                document.body.classList.add('yellow-bg');
            } else {
                document.body.classList.remove('green-bg', 'yellow-bg');
                document.body.classList.add('red-bg');
            }
        }

        function toggleButtons() {
            if (isRunning) {
                startBtn.disabled = true;
                pauseBtn.disabled = false;
                resetBtn.disabled = false;
            } else {
                startBtn.disabled = false;
                pauseBtn.disabled = true;
                resetBtn.disabled = false;
            }
        }

function openLightbox(imageUrl) {
    const lightbox = document.createElement("div");
    lightbox.style.position = "fixed";
    lightbox.style.top = "0";
    lightbox.style.left = "0";
    lightbox.style.width = "100%";
    lightbox.style.height = "100%";
    lightbox.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    lightbox.style.display = "flex";
    lightbox.style.justifyContent = "center";
    lightbox.style.alignItems = "center";
    lightbox.style.zIndex = "1000";

    const img = document.createElement("img");
    img.src = imageUrl;
    img.style.maxWidth = "90%";
    img.style.maxHeight = "90%";
    img.style.objectFit = "contain";
    
    lightbox.appendChild(img);

    lightbox.addEventListener("click", () => {
        document.body.removeChild(lightbox);
    });

    document.body.appendChild(lightbox);
}

class Cart {
    constructor() {
        this.items = [];
        this.cartElement = document.getElementById("cart-items");
        this.totalPriceElement = document.getElementById("total-price"); 
    }

    addProductToCart(product) {
        const productInCart = this.items.find(item => item.product.id === product.id);

        if (productInCart) {
            productInCart.quantity += 1;
        } else {
            this.items.push({ product: product, quantity: 1 }); 
        }

        this.updateCart();
        this.updatePrice();
    }

    updateCart() {
        this.cartElement.innerHTML = "";  
        this.items.forEach(item => {
            const cartItemElement = document.createElement("div");
            cartItemElement.classList.add("cart-item");

            const itemInfo = document.createElement("span");
            itemInfo.textContent = `${item.product.name} x ${item.quantity} - $${(item.product.price * item.quantity).toFixed(2)}`;
            cartItemElement.appendChild(itemInfo);

            const removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", () => this.removeProductFromCart(item.product.id));
            cartItemElement.appendChild(removeButton);

            this.cartElement.appendChild(cartItemElement);
        });
    }

    removeProductFromCart(productId) {
        const productInCart = this.items.find(item => item.product.id === productId);
        
        if (productInCart) {
            if (productInCart.quantity > 1) {
                productInCart.quantity -= 1;
            } else {
                this.items = this.items.filter(item => item.product.id !== productId);
            }
            this.updateCart();
            this.updatePrice();
        }
    }
    

    updatePrice() {
        const totalPrice = this.items.reduce((acc, item) => acc + (item.product.price * item.quantity), 0);
        
        this.totalPriceElement.textContent = `Total: $${totalPrice.toFixed(2)}`;
    }
}

    

    


const cart = new Cart();

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
        image.onclick = () => openLightbox(this.image);
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

const products = [
    new Product(1, "Laptop", 999.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
    new Product(2, "Smartphone", 599.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
    new Product(3, "Headphones", 199.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
    new Product(4, "Watch", 149.99, "https://m.media-amazon.com/images/I/61Qe0euJJZL.jpg"),
    new Product(5, "Wireless earphones", 49.99, "https://media.istockphoto.com/id/1446045839/photo/outdoor-security-camera-cctv-secure-monitoring-concept-3d-rendering.jpg?s=612x612&w=0&k=20&c=j3TAaHznRCw7sd3C5I1ofTADRchAQdAgeGeEk7w52fc="),
    new Product(6, "Keyboard", 300.99, "https://media.istockphoto.com/id/1446045839/photo/outdoor-security-camera-cctv-secure-monitoring-concept-3d-rendering.jpg?s=612x612&w=0&k=20&c=j3TAaHznRCw7sd3C5I1ofTADRchAQdAgeGeEk7w52fc="),
    new Product(7, "Xiaomi 15 Ultra", 500, "https://media.istockphoto.com/id/1446045839/photo/outdoor-security-camera-cctv-secure-monitoring-concept-3d-rendering.jpg?s=612x612&w=0&k=20&c=j3TAaHznRCw7sd3C5I1ofTADRchAQdAgeGeEk7w52fc="),
    new Product(8, "Security Camera", 250, "https://media.istockphoto.com/id/1446045839/photo/outdoor-security-camera-cctv-secure-monitoring-concept-3d-rendering.jpg?s=612x612&w=0&k=20&c=j3TAaHznRCw7sd3C5I1ofTADRchAQdAgeGeEk7w52fc="),
];

const productListElement = document.getElementById("product-list");
products.forEach(product => {
    const productElement = product.createProductElement();
    productListElement.appendChild(productElement);
});
