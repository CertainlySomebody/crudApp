<template>
    <div class="container mx-auto" v-if="pending">
        <p>Loading...</p>
    </div>
    <div class="container mx-auto" v-else>
        <p class="my-5">Customer id: {{ $route.params.id }}</p>
        <p class="my-5">Name: {{ customer.firstName + ' ' + customer.lastName }} </p>
        <p class="my-5">Email: {{ customer.email }}</p>
        <p class="my-5">Phone Number: {{ customer.phoneNumber }}</p>
    </div>

</template>

<script setup>
    const route = useRoute();

    const { pending, data: customer } = await useLazyFetch(`http://localhost:8080/customers/${route.params.id}`);
</script>
