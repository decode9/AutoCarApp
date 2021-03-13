<template>
  <header>
    <div class="_headerUser">
      <div class="_dropDown">
        <p @click="setDrop">
          {{ user?.name }}
        </p>
        <div
          class="_dropDownMenu _noToggle"
          v-bind:class="{ _toggle: dropdown }"
        >
          <ul>
            <li @click="logout">Cerrar Sesion</li>
          </ul>
        </div>
      </div>
    </div>
  </header>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
