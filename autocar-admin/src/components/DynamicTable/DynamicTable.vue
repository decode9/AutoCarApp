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
      <tfoot>
        <tr>
          <td :colspan="Math.floor(keys.length / 2) + 1" class="_perPage">
            <select v-model="perPage" name="per_page">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
          </td>
          <td :colspan="Math.ceil(keys.length / 2)">
            <div class="_pagination">
              <div
                v-for="key in pages"
                v-bind:key="key"
                v-bind:class="{ _selected: key == current_page }"
                @click="reloadPages($event.target.textContent)"
              >
                <p>{{ key }}</p>
              </div>
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</template>

<script lang="ts" src="./index.ts"/>
<style scoped lang="scss" src="./styles.scss" />
