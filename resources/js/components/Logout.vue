<template>
    <div style="background: #fff; width: 100vw; height: 100vh">
    </div>
</template>

<script>
export default {
    name: "Logout",
    data: function () {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCategories();
    },

    methods: {
        loadCategories: function () {
            axios.post('/api/logout', {
                token: csrf
            })
                .then((response) => {
                    location.href = "/";
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
