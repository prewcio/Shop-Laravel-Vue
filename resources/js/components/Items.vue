<template>
    <div class="items">
        <div class="item" v-for="item in items">
            <img height="100px" :src="item.img">
            <h2>{{ item.name }}</h2>
            <p>{{ item.price }} PLN</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Items",
    data: function () {
        return {
            items: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCartItems();
    },

    methods: {
        loadCartItems: function () {
            axios.get('/api/getItems')
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
