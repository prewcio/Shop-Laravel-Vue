<template>
    <header>
        <div class="logo">
            <h1><a href="/">Logo</a></h1>
        </div>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/" class="close-link">Home</a></li>
                <li class="nav-item"><a href="/category" class="close-link">Kategorie</a></li>
                <li class="nav-item"><a href="/about" class="close-link">O nas</a></li>
                <li class="nav-item"><a href="/statute" class="close-link">Regulamin</a></li>
                <li class="nav-item"><a href="/contact" class="close-link">Kontakt</a></li>
            </ul>
        </nav>
        <div class="links">
            <a href="/cart" id="cartNumber"><i class="ri-shopping-cart-line"></i>
                <p id="cart-total">
                    {{ itemsQuantity }}
                </p>
            </a>
            <a href="/account"><i class="ri-account-circle-fill"></i></a>
        </div>
        <div class="hamburger-menu">
            <span class="bar-menu"></span>
            <span class="bar-menu"></span>
            <span class="bar-menu"></span>
        </div>
    </header>
</template>

<script>
export default {
    name: "Navi",
    data: function () {
        return {
            itemsQuantity: 0,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCartItems();
    },

    methods: {
        loadCartItems: function () {
            axios.post('/api/cartCount', {
                sessionID: this.csrf
            })
                .then((response) => {
                    this.itemsQuantity = response.data.itemsQuantity;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}



</script>

<style scoped>

</style>
