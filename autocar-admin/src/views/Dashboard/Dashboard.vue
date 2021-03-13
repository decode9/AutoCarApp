<template>
  <div class="_bodyDashboard">
    <SideBar />
    <div class="_contentDashboard">
      <Header />
      <div class="_content">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
