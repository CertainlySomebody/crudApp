<template>
    <div class="container mx-auto flex basis-full justify-center flex-col">
        <div class="flex justify-between items-center">
            <div class="table-caption text-4xl font-bold py-4">Customers Table</div>
            <NuxtLink :to="`customers/add/`" class="bg-indigo-500 p-2 m-2 rounded-xl font-bold" v-if="customers">Add</NuxtLink>
        </div>
        <table class="table rounded-sm border-gray-500 border-2">
            <tr>
                <th class="table-cell p2 border bg-green-700">First name</th>
                <th class="table-cell p2 border bg-green-700">Last name</th>
                <th class="table-cell p2 border bg-green-700">Email</th>
                <th class="table-cell p2 border bg-green-700">Phone number</th>
                <th class="table-cell p2 border bg-green-700">Actions</th>
            </tr>
            <tr v-if="!customers">
                <p>Database is empty</p>
            </tr>
            <tr v-for="c in customers" class="table-row">
                <td class="table-cell p-2 border">{{ c.firstName }}</td>
                <td class="table-cell p-2 border">{{ c.lastName }}</td>
                <td class="table-cell p-2 border">{{ c.email }}</td>
                <td class="table-cell p-2 border">{{ c.phoneNumber }}</td>
                <td class="table-cell p-2 border">
                    <NuxtLink :to="`customers/inspect/${c.id}`" class="bg-green-500 p-2 m-2 rounded-xl font-bold">Show details</NuxtLink>
                    <NuxtLink :to="`customers/edit/${c.id}`" class="bg-sky-500 p-2 m-2 rounded-xl font-bold">Edit</NuxtLink>
                    <button v-on:click="deleteCustomer(c.id)" class="bg-red-500 p-2 m-2 rounded-xl font-bold">Delete</button>
                </td>

            </tr>
        </table>
    </div>
</template>

<script setup>

const { data: customers, refresh, pending } = await useLazyFetch('http://localhost:8080/customers');

async function deleteCustomer( id ) {
    await $fetch( 'http://localhost:8080/customers/delete/' + id, {
        method: 'DELETE'
    });

    refresh();
}

</script>