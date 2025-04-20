<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
      <h1 class="text-2xl font-bold mb-4">User Profile</h1>
      <div v-if="user">
        <p><strong>ID:</strong> {{ user.id }}</p>
        <p><strong>Name:</strong> {{ user.name }}</p>
        <p><strong>Email:</strong> {{ user.email }}</p>
        <p><strong>Created:</strong> {{ formatDate(user.created_at) }}</p>
        <p><strong>Updated:</strong> {{ formatDate(user.updated_at) }}</p>
      </div>
      <div v-else>
        <p class="text-red-500">User not found.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  user: Object
})

const formatDate = (date) => {
  return new Date(date).toLocaleString()  
}
</script>

<style scoped>
/* Optional CSS */
</style>
