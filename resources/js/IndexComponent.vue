<template>

    <div class="col-md-12">
        <list-component></list-component>
    </div>

</template>

<script>
import ListComponent from "./components/ListComponent";
export default {
    name: "IndexComponent",
    components: { ListComponent}
}
</script>

<style>
#app {
    width: 100%;
    margin-top: 60px;
}

@import'~bootstrap/dist/css/bootstrap.css';
</style>
