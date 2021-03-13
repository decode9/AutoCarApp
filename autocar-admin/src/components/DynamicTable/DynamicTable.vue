<template>
  <div class="_tableBody">
    <table>
      <thead>
        <tr>
          <th v-for="key in keys" v-bind:key="key">
            {{ key }}
          </th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in records" v-bind:key="data['id']">
          <td v-for="key in keys" v-bind:key="key">
            {{ data[key] }}
          </td>
          <td>
            <button class="_editButton">Editar</button>
            <button class="_deleteButton">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
