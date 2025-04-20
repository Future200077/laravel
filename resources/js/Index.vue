<template>
  <div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Discussion Board</h1>

    <form @submit.prevent="submit">
      <input v-model="form.title" placeholder="Title" class="w-full mb-2 p-2 border rounded" />
      <textarea v-model="form.body" placeholder="Body" class="w-full mb-2 p-2 border rounded"></textarea>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">Post</button>
    </form>

    <div v-for="discussion in discussions" :key="discussion.id" class="bg-white p-4 shadow rounded mt-4">
      <h2 class="font-semibold text-lg">{{ discussion.title }}</h2>
      <p class="text-sm text-gray-700">{{ discussion.body }}</p>

      <div class="mt-2 space-x-2">
        <inertia-link :href="`/discussions/${discussion.id}/edit`" class="text-blue-500">Edit</inertia-link>
        <button @click="destroy(discussion.id)" class="text-red-500">Delete</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({ discussions: Array })

const form = useForm({ title: '', body: '' })

const submit = () => form.post('/discussions')

const destroy = (id) => {
  if (confirm('Are you sure?')) {
    Inertia.delete(`/discussions/${id}`)
  }
}
</script>
