<template>
  <div class="_sideBar">
    <div class="_logo">
      <img
        src="../../assets/img/logo.png"
        alt="logo"
        width="100"
        height="100"
      />
    </div>
    <nav class="_sideNavigation">
      <ul>
        <li v-for="route in routes" v-bind:key="route.label">
          <router-link v-bind:to="route.route">
            {{ route.label }}
          </router-link>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
