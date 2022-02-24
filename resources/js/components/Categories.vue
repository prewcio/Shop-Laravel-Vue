<template>
    <div class="list">
        <div class="loader" v-if="loading===true"><img src="/img/loader.gif" /></div>
        <div class="categories" v-for="category in categories">
            <h2>{{ category.name }}</h2>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data: function () {
        return {
            categories: [],
            loading: true,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCategories();
    },

    methods: {
        loadCategories: function () {
            axios.get('/api/getCategories')
                .then((response) => {
                    this.categories = response.data.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500);
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
