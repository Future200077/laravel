<script setup>
defineProps(['discussions']);
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';
function logout() {
  Inertia.post('/logout');
}

</script>

<template>
  <div class="container">

    <div style="text-align: right; margin-bottom: 10px;">
      <button @click="logout" class="logout-button">
        🔒 Logout
      </button>
    </div>
    <div class="heading">💬 Discussions</div>

    <div style="margin-bottom: 20px;">
      <Link href="/discussions/create" class="button">➕ New Discussion</Link>
    </div>

    <div v-for="discussion in discussions" :key="discussion.id" class="card">
      <div class="card-title">{{ discussion.title }}</div>
      <div class="card-body">{{ discussion.body }}</div>
      <div class="card-footer" style="margin-top: 10px; color: #aaa;">
        Posted by <strong>{{ discussion.user.name }}</strong>
      </div>
    </div>
  </div>
</template>
