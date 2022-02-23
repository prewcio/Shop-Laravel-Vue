<template>
    <footer>
        <div>
            <p>&copy; {{ CurrentYear }} Nazwa firmy Wszelkie prawa zastrzeżone</p>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Webfoot",
    data: function () {
        return {
            CurrentYear: new Date().getFullYear()
        }
    },
    mounted() {
    },

    methods: {
    }
}
</script>

<style scoped>

</style>
