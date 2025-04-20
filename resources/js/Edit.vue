<template>
  <div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Discussion</h1>

    <form @submit.prevent="submit">
      <input v-model="form.title" class="w-full mb-2 p-2 border rounded" />
      <textarea v-model="form.body" class="w-full mb-2 p-2 border rounded"></textarea>
      <button class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({ discussion: Object })

const form = useForm({
  title: props.discussion.title,
  body: props.discussion.body
})

const submit = () => {
  form.put(`/discussions/${props.discussion.id}`)
}
</script>
