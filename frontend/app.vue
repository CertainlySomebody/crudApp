<template>
  <div>
    <NuxtLayout>
      <header class="container mx-auto px-4">
        <ul class="container flex basis-full h-20">
          <li class="flex items-center">
            <h1>CRUD application</h1>
          </li>
          <li class="flex items-center text-center transition !duration-300 focus:outline-none rounded font-bold text-white bg-blue-400 ring-4 ring-blue-500 ring-opacity-50 cursor-pointer hover:bg-indigo-400 hover:ring-indigo-500 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl hover:opacity-80 shadow-indigo-500 m-4">
            <NuxtLink class="w-full h-full py-3 px-8" :to='`/`'>Home</NuxtLink>
          </li>
          <li class="flex items-center text-center transition !duration-300 focus:outline-none rounded font-bold text-white bg-blue-400 ring-4 ring-blue-500 ring-opacity-50 cursor-pointer hover:bg-indigo-400 hover:ring-indigo-500 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl hover:opacity-80 shadow-indigo-500 m-4">
            <NuxtLink class="w-full h-full py-3 px-8" :to='`/customers`'>Customers</NuxtLink>
          </li>
        </ul>
      </header>
      <NuxtPage />
      <footer class="flex container mx-auto h-8 justify-center">
        Project made by: <b>Dominik Bak</b>
      </footer>
    </NuxtLayout>
  </div>
</template>
