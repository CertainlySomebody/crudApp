<template>
    <div class="container mx-auto">
        <p class="py-8">Add Customer</p>
        
        <FormKit type="form" @submit="submitHandler">
            <FormKit
                type="text"
                name="firstName"
                label="First name"
                validation="required"
            />

            <FormKit
                type="text"
                name="lastName"
                label="Last name"
                validation="required"
            />

            <FormKit
                type="text"
                name="email"
                label="Email"
                validation="required"
            />

            <FormKit
                type="text"
                name="phoneNumber"
                label="Phone number"
                validation="required"
            />
        </FormKit>
    </div>
</template>

<script setup>

    function submitHandler(values) {
        addCustomer(values);

        console.log(values);
    }

    async function addCustomer(data) {
        await $fetch( `http://localhost:8080/customers/add`, {
            method: 'POST',
            body: data
        } );
    }

</script>