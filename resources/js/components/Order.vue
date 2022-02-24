<template>
    <div class="content">
        <div class="form">
<!--            <form @submit.prevent="loginForm">-->
            <form>
                <br><br><br><br><br>
                <h1 class="account">Konto</h1>
                <input type="email" placeholder="Adres E-mail" required>

                <h1 class="deliver">Dostawa</h1>
                <div class="delivery">
                    <label for="kurier">
                        <input type="radio" name="dostawa" id="kurier" value="kurier" required>
                        <div class="item">
                            <span>Kurier - InPost</span>
                            <i class="ri-truck-line"></i>
                        </div>
                    </label>
                    <label for="osobisty">
                        <input type="radio" name="dostawa" id="osobisty" value="osobisty" required>
                        <div class="item">
                            <span>Odbiór Osobisty</span>
                            <i class="ri-home-2-line"></i>
                        </div>
                    </label>
                </div>

                <h1 class="payment">Płatność</h1>
                <div class="pay">
                    <label for="dotpay">
                        <input type="radio" name="payment" id="dotpay" value="dotpay" required>
                        <div class="item">
                            <span>Płatność online</span>
                            <img src="/img/dotpay.png" alt="dotpay" height="25px">
                        </div>
                    </label>
                    <label for="payu">
                        <input type="radio" name="payment" id="payu" value="payu" required>
                        <div class="item">
                            <span>Płatność online</span>
                            <img src="/img/payu.png" alt="PayU" height="35px">
                        </div>
                    </label>
                </div>
            </form>
        </div>
        <div class="summary">
            <div class="sum-item" v-for="item in items">
                <div class="item-info">
                    <img :src="item.img" height="100px">
                    <h3>{{ item.name }}</h3>
                    <br><br>
                    <span class="quan">{{ item.quantity }} szt.</span>
                    <span class="price">{{ parseFloat((item.price_no_dec*item.quantity)/100).toFixed(2) }} PLN</span>
                </div>
            </div>

            <div class="sum-item">
                <h3>Sposób płatności:</h3>
                <p id="payment-type">BRAK</p>
                <h3>Sposób dostawy:</h3>
                <p id="delivery-type">BRAK</p>
                <h3>Zamówienie wyślemy:</h3>
                <p>Gdy zaksięgujemy płatność.<br>Potwierdzenie wysyłki dostaniesz mailem</p>
            </div>
            <div class="sum-item">
                <h3>Wartość koszyka:
                    <span id="cartPrice">{{ parseFloat(priceLast/100).toFixed(2) }}</span> zł</h3>
                <h3>Dostawa: <span id="delPrice">0.00</span> zł</h3>
            </div>
            <div class="sum-item">
                <h3>Do zapłaty: <strong>
                    <span id="finalPrice">{{ parseFloat(priceLast/100).toFixed(2) }}</span> PLN
                </strong></h3>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Order",
    data: function () {
        return {
            itemsQuantity: 0,
            items: [],
            priceLast: 0,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCartItems();
    },

    methods: {
        loadCartItems: function () {
            axios.post('/api/getCart', {
                csrf: this.csrf
            })
                .then((response) => {
                    this.items = response.data.data;
                    this.items.forEach(this.countLastPrice);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        countLastPrice: function(item) {
            this.priceLast += item.price_no_dec*item.quantity;
        }
    }
}
</script>

<style scoped>

</style>
