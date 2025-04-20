<template>
  <div class="forum-container">
    <div style="text-align: right; margin-bottom: 10px;">
      <button @click="logout" class="logout-button">
        🔒 Logout
      </button>
    </div>
    <h1 class="forum-title">Forum</h1>

    <form @submit.prevent="submit" class="post-form">
      <input v-model="form.title" type="text" placeholder="Title" class="input-title" />
      <textarea v-model="form.content" placeholder="Your post..." class="input-content"></textarea>
      <button class="btn-post" :disabled="form.processing">Post</button>
    </form>

    <div v-for="topic in topics" :key="topic.id" class="topic-card" @click = "() => showreply(topic.id)">
      <h2 class="topic-title">{{ topic.title }}</h2>
      <p class="topic-content">{{ topic.content }}</p>
      <p class="topic-author">By {{ topic.user.name }}</p>

     
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'

// Replaced Ziggy import with window.route usage

defineProps({ topics: Array })

const form = useForm({ title: '', content: '' })
const replyForms = ref({})

function submit() {
  form.post(window.route('topics.store'), {
    onSuccess: () => form.reset()
  })
}

function logout() {
  Inertia.post('/logout');
}


function reply(topicId) {
  const content = replyForms.value[topicId]
  Inertia.post(window.route('replies.store', topicId), { content }, {
    onSuccess: () => replyForms.value[topicId] = ''
  })
}

function showreply(topicId){
  Inertia.get( window.route('replies.show', topicId))
}

</script>
