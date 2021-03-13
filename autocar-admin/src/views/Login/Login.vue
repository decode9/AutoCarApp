<template>
  <div class="_bodyLogin">
    <div class="_boxLogin">
      <img
        src="../../assets/img/logo.png"
        alt="logo"
        width="200"
        height="200"
      />
      <div class="_boxInput">
        <input
          placeholder="Correo Electronico"
          type="text"
          class="_input"
          v-model="form.email"
          name="email"
        />
        <input
          placeholder="Contrasena"
          type="password"
          class="_input"
          name="password"
          v-model="form.password"
        />
      </div>
      <button class="_buttonLogin" :disabled="send" @click="login">Iniciar Sesion</button>
    </div>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
