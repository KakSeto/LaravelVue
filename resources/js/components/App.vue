<template>
    <div class="page">
        <nav class='navbar navbar-dark bg-dark'>
            <div class='container'>
                <router-link :to="{ name: 'home' }" class="navbar-brand">Seto Store</router-link>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>