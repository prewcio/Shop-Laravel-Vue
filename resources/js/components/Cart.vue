<template>
    <div class="content">
        <div class="row">
            <div class="box-element">
                <div class="shop-btn">
                    <div class="space-btn btn-wd"><a href="/">&#x2190; Kontynuj zakupy</a></div>
                </div>
                <br>
                <hr>
                <br>
                <div class="space">
                    <div>
                        <h5><strong>Produkty:</strong></h5>
                    </div>
                    <div>
                        <h5>Razem: <strong><span name="final-price">
<!--                                {{ finalPrice }}-->
                            </span> PLN</strong></h5>
                    </div>
                    <div class="space-btn"><a href="/order">Potwierdzenie</a></div>
                </div>
            </div><br>
            <div class="box-element" v-for="item in items">
                <div class="cart-row">
                    <div style="flex:2"><img :src="item.img" alt="Stół" class="row-image"/></div>
                    <div style="flex:2">
                        <p>{{ item.name }}</p>
                    </div>
                    <div style="flex:1">
                        <p><span id="price">{{ item.price }}</span> PLN</p>
                    </div>
                    <div style="flex:1">
                        <p class="quantity" id="qua">{{ item.itemQuantity }}</p>
                        <div class="quantity">
<!--                            <img class="chg-quantity" src="{{asset('img/arrow_up.png')}}" onclick="window.location.href = '{{ url('/addToCart/'.$items[$i]->id) }}'">-->
<!--                            <img class=" chg-quantity" src="{{asset('img/arrow_down.png')}}" onclick="window.location.href = '{{ url('/removeFromCart/'.$items[$i]->id) }}'">-->
                        </div>
                    </div>
                    <div style=" flex:1">
<!--                        <p><span name="final-price">{{ $items[$i]->productPrice*$itemsQuantity[$i] }}</span> PLN</p>-->
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart",
    data: function () {
        return {
            itemsQuantity: 0,
            items: [],
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
