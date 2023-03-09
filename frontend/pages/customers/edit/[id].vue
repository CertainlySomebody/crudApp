<template>

    <div class="container mx-auto" v-if="pending">
        <p>Loading...</p>
    </div>

    <div class="container mx-auto" v-else>
        <p class="py-8">Edit page</p>
        <p class="py-4">Customer id: {{ $route.params.id }}</p>
        <FormKit type="form" @submit="submitHandler">
            <FormKit
                type="text" 
                name="firstName"
                label="First name"
                v-model="customer.firstName"
                validation="required"
            />

            <FormKit 
                type="text" 
                name="lastName" 
                label="Last name"
                v-model="customer.lastName"
                validation="required"
            />

            <FormKit 
                type="text" 
                name="email" 
                label="Email"
                v-model="customer.email"
                validation="required|email"
            />

            <FormKit 
                type="text" 
                name="phoneNumber" 
                label="Phone number"
                v-model="customer.phoneNumber"
                validation="required"
            />
        </FormKit>
    </div>
</template>

<script setup>
    const route = useRoute();
    const nuxtApp = useNuxtApp();

    const { pending, data: customer} = await useLazyFetch(`http://localhost:8080/customers/${route.params.id}`);


    function submitHandler(values) {
        editCustomer(values)

        return navigateTo('/customers');
    }

    async function editCustomer(data) {
        await $fetch( `http://localhost:8080/customers/update/${route.params.id}`, {
            method: 'PUT',
            body: data
        } );
    }

</script>

