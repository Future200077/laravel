<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  title: '',
  body: '',
});

const submit = () => {
  form.post('/discussions');
};
</script>

<template>
  <div class="container">
    <div class="heading">📝 Create a Discussion</div>

    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Title</label>
        <input type="text" v-model="form.title" />
        <div v-if="form.errors.title" style="color: red;">{{ form.errors.title }}</div>
      </div>

      <div class="form-group">
        <label>Body</label>
        <textarea rows="5" v-model="form.body"></textarea>
        <div v-if="form.errors.body" style="color: red;">{{ form.errors.body }}</div>
      </div>

      <button type="submit" class="button">🚀 Post Discussion</button>
    </form>
  </div>
</template>
