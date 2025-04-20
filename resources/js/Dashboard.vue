<template>
  <div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Discussion Field</h1>

    <div class="bg-white shadow rounded p-4 mb-6">
      <form @submit.prevent="submit">
        <input v-model="form.title" type="text" placeholder="Title"
               class="w-full mb-2 border rounded p-2" required />

        <textarea v-model="form.body" placeholder="Start your discussion..."
                  class="w-full mb-2 border rounded p-2 h-32" required></textarea>

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
          Post Discussion
        </button>
      </form>
    </div>

    

    <div v-for="d in discussions" :key="d.id" class="bg-white p-4 rounded shadow mb-4">
      <h2 class="text-xl font-semibold">{{ d.title }}</h2>
      <p class="text-gray-700">{{ d.body }}</p>
      <small class="text-gray-500">By {{ d.user.name }}</small>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
defineProps({ discussions: Array })

const form = useForm({
  title: '',
  body: ''
})

const submit = () => {
  form.post(route('discussions.store'), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset()
    }
  })
}
</script>
