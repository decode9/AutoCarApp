<template>
  <div class="_bodyCrud">
    <div class="_headerCrud">
      <div class="_title">
        <h2>{{ title }}</h2>
      </div>
      <div class="_headerActions">
        <button class="_createButton">Crear</button>
        <button class="_createButton">Reporte</button>
      </div>
    </div>
    <div class="_bodyCrud">
      <DynamicTable :keys="keys" :records="getter" />
    </div>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
