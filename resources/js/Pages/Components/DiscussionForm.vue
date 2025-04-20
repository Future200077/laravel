<template>
  <form>
    <input v-model="title" placeholder="Title" required />
    <textarea v-model="body" placeholder="Body" required></textarea>
    <button type="submit">Post</button>
  </form>
</template>

<script setup>
import { ref } from 'vue';

const emit = defineEmits(['submitted']);

const title = ref('');
const body = ref('');

</script>